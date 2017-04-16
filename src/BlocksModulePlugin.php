<?php namespace Anomaly\BlocksModule;

use Anomaly\BlocksModule\Group\Command\GetGroup;
use Anomaly\BlocksModule\Group\Contract\GroupInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class BlocksModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule
 */
class BlocksModulePlugin extends Plugin
{

    /**
     * Get the plugin functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'blocks',
                function ($identifier) {

                    /* @var GroupInterface $group */
                    if (!$group = $this->dispatch(new GetGroup($identifier))) {
                        return null;
                    }

                    return $group->getBlocks();
                }, ['is_safe' => ['html']]
            ),
        ];
    }
}
