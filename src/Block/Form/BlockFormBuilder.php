<?php namespace Anomaly\BlocksModule\Block\Form;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
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
     * @var null|Extension
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
     * @return Extension|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the block type.
     *
     * @param Extension $type
     * @return $this
     */
    public function setType(Extension $type)
    {
        $this->type = $type;

        return $this;
    }
}
