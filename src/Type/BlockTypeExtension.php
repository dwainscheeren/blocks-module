<?php namespace Anomaly\BlocksModule\Type;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class BlockTypeExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Type
 */
class BlockTypeExtension extends Extension
{

    /**
     * Get the form builder
     *
     * @return FormBuilder
     */
    public function getFormBuilder()
    {
        $builder = explode('\\', get_class($this));

        $extension = array_pop($builder);

        return app(implode('\\', $builder) . '\Form\\' . substr($extension, 0, -9) . 'FormBuilder');
    }
}
