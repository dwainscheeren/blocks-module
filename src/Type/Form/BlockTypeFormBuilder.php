<?php namespace Anomaly\BlocksModule\Type\Form;

use Anomaly\BlocksModule\Block\Contract\BlockInterface;
use Anomaly\BlocksModule\Block\Form\BlockFormBuilder;
use Anomaly\ConfigurationModule\Configuration\Form\ConfigurationFormBuilder;
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
     * Fired just before saving the configuration.
     */
    public function onSavingConfiguration()
    {
        /* @var BlockFormBuilder $block */
        $block = $this->forms->get('block');

        /* @var BlockInterface $entry */
        $entry = $block->getFormEntry();

        /* @var ConfigurationFormBuilder $configuration */
        $configuration = $this->forms->get('configuration');

        if (!$configuration->getScope()) {
            $configuration->setScope($entry->getSlug());
        }
    }
}
