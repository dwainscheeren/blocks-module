<?php namespace Anomaly\BlocksModule\Block\Form;

use Anomaly\BlocksModule\Block\Type\BlockTypeExtension;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class BlockFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Block\Form
 */
class BlockFormBuilder extends FormBuilder
{

    /**
     * The block type.
     *
     * @var null|BlockTypeExtension
     */
    protected $type = null;

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'name',
        'slug' => [
            'disabled' => 'edit'
        ],
        'description',
        'group',
        'css',
        'js'
    ];

    /**
     * Fired just before
     * saving the form entry.
     */
    public function onSaving()
    {
        $type  = $this->getType();
        $block = $this->getFormEntry();

        $block->type = $type->getNamespace();
    }

    /**
     * Get the block type.
     *
     * @return BlockTypeExtension|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the block type.
     *
     * @param BlockTypeExtension $type
     * @return $this
     */
    public function setType(BlockTypeExtension $type)
    {
        $this->type = $type;

        return $this;
    }
}
