<?php namespace Anomaly\BlocksModule\Block\Type\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

/**
 * Class BlockTypeFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Type\Form
 */
class BlockTypeFormBuilder extends MultipleFormBuilder
{

    /**
     * Fired just after the type is saved.
     */
    public function onSavedType()
    {
        /* @var FormBuilder $type */
        /* @var FormBuilder $form */
        $type  = $this->getChildForm('type');
        $block = $this->getChildForm('block');

        $entry = $type->getFormEntry();
        $block = $block->getFormEntry();

        if (!$block->entry_type) {
            $block->entry_type = get_class($entry);
            $block->entry_id   = $entry->getId();
        }
    }
}
