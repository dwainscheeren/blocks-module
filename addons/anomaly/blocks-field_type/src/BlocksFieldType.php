<?php namespace Anomaly\BlocksFieldType;

use Anomaly\BlocksFieldType\Block\BlocksModel;
use Anomaly\BlocksFieldType\Command\GetMultiformFromPost;
use Anomaly\BlocksFieldType\Command\GetMultiformFromValue;
use Anomaly\BlocksFieldType\Validation\ValidateBlocks;
use Anomaly\BlocksModule\Block\BlockExtension;
use Anomaly\BlocksModule\Block\Form\BlockFormBuilder;
use Anomaly\BlocksModule\Block\Form\BlockInstanceFormBuilder;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Field\Contract\FieldInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;
use Illuminate\Contracts\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class BlocksFieldType
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BlocksFieldType extends FieldType
{

    /**
     * The input class.
     *
     * @var string
     */
    protected $class = 'blocks-container';

    /**
     * No database column.
     *
     * @var bool
     */
    protected $columnType = false;

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.blocks::input';

    /**
     * The filter view.
     *
     * @var string
     */
    protected $filterView = 'anomaly.field_type.blocks::filter';

    /**
     * The field rules.
     *
     * @var array
     */
    protected $rules = [
        'array',
        'blocks',
    ];

    /**
     * The field validators.
     *
     * @var array
     */
    protected $validators = [
        'blocks' => [
            'message' => false,
            'handler' => ValidateBlocks::class,
        ],
    ];

    /**
     * The service container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new BlocksFieldType instance.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Return the field ID.
     *
     * @return int
     */
    public function id()
    {
        return $this->entry->getField($this->getField())->getId();
    }

    /**
     * Get the relation.
     *
     * @return HasMany
     */
    public function getRelation()
    {
        $entry = $this->getEntry();
        $model = $this->getRelatedModel();

        return new HasMany(
            $model->newQuery(),
            $entry,
            'related_id',
            'id'
        );

        return $entry->belongsToMany(
            $model,
            $this->getPivotTableName(),
            'entry_id',
            'related_id'
        );
//        return (new BlocksRelation($model->newQuery(), $entry, $model->getTable() . '.' . 'related_id', 'id'))
//            ->orderBy($this->getPivotTableName() . '.sort_order', 'ASC');
    }

    /**
     * Get the pivot table.
     *
     * @return string
     */
    public function getPivotTableName()
    {
        return $this->entry->getTableName() . '_' . $this->getField();
    }

    /**
     * Get the related table.
     *
     * @return string
     */
    public function getRelatedTableName()
    {
        return $this->getRelatedModel()->getTable();
    }

    /**
     * Get the related model.
     *
     * @return null|Model
     */
    public function getRelatedModel()
    {
        return (new BlocksModel())->setTable($this->getPivotTableName());
    }

    /**
     * Get the rules.
     *
     * @return array
     */
    public function getRules()
    {
        $rules = parent::getRules();

        if ($min = array_get($this->getConfig(), 'min')) {
            $rules[] = 'min:' . $min;
        }

        if ($max = array_get($this->getConfig(), 'max')) {
            $rules[] = 'max:' . $max;
        }

        return $rules;
    }

    /**
     * Return the input value.
     *
     * @param null $default
     * @return null|MultipleFormBuilder
     */
    public function getInputValue($default = null)
    {
        return $this->dispatch(new GetMultiformFromPost($this));
    }

    /**
     * Return if any posted input is present.
     *
     * @return boolean
     */
    public function hasPostedInput()
    {
        return true;
    }

    /**
     * Get the validation value.
     *
     * @param null $default
     * @return array
     */
    public function getValidationValue($default = null)
    {
        if (!$forms = $this->getInputValue($default)) {
            return [];
        }

        return $forms->getForms()->map(
            function ($builder) {

                /* @var FormBuilder $builder */
                return $builder->getFormEntryId();
            }
        )->all();
    }

    /**
     * Return a form builder instance.
     *
     * @param FieldInterface $field
     * @param BlockExtension $extension
     * @param null           $instance
     * @return FormBuilder
     */
    public function form(FieldInterface $field, BlockExtension $extension, $instance = null)
    {

        /* @var BlockInstanceFormBuilder $form */
        /* @var BlockFormBuilder $block */
        $form  = app(BlockInstanceFormBuilder::class);
        $block = app(BlockFormBuilder::class);

        $block->setExtension($extension);

        $form->on(
            'saving_block',
            function () use ($form, $block) {
                $block->setFormEntryAttribute(
                    'entry',
                    $form->getChildFormEntry('entry')
                );
            }
        );

        $form->addForm('block', $block);

        $extension->extend($form);

        $form
            ->setOption('block_extension', $extension)
            ->setOption('block_instance', $instance)
            ->setOption('block_field', $field->getId())
            ->setOption('block_prefix', $this->getFieldName())
            ->setOption('block_title', $extension->getNamespace('addon.title'))
            ->setOption('form_view', 'anomaly.field_type.blocks::form')
            ->setOption('wrapper_view', 'anomaly.field_type.blocks::wrapper')
            ->setOption('prefix', $this->getFieldName() . '_' . $instance . '_');

        return $form;
    }

    /**
     * Return an array of entry forms.
     *
     * @return array
     */
    public function forms()
    {
        if (!$forms = $this->dispatch(new GetMultiformFromValue($this))) {
            return [];
        }

        return array_map(
            function (FormBuilder $form) {
                return $form
                    ->make()
                    ->getForm();
            },
            $forms->getForms()->all()
        );
    }

    /**
     * Handle saving the form data ourselves.
     *
     * @param FormBuilder $builder
     */
    public function handle(FormBuilder $builder)
    {
        $entry = $builder->getFormEntry();

        /**
         * If we don't have any forms then
         * there isn't much we can do.
         */
        if (!$forms = $this->getInputValue()) {

            $entry->{$this->getField()} = null;

            return;
        }

        /*
         * Handle the post action
         * for all the child forms.
         */
        $forms->handle();

        // See the accessor for how IDs are handled.
        $entry->{$this->getField()} = $forms->getForms()->map(
            function ($builder) {

                /* @var FormBuilder $builder */
                return [
                    'related_id' => $this->entry->getId(),
                    'entry_id'   => $builder->getFormEntryId(),
                    'entry_type' => get_class($builder->getFormEntry()),
                    'block_type' => $builder->getOption('block_type'),
                ];
            }
        )->all();
    }
}
