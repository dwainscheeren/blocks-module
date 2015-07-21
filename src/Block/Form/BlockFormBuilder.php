<?php namespace Anomaly\BlocksModule\Block\Form;

use Anomaly\BlocksModule\Type\BlockTypeExtension;
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
        'group'
    ];

    /**
     * The fields to skip.
     *
     * @var array
     */
    protected $skips = [
        'type'
    ];

    /**
     * Fired just before
     * saving the form entry.
     */
    public function onSaving()
    {
        $type  = $this->getType();
        $entry = $this->getFormEntry();

        $entry->type = $type->getNamespace();
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
