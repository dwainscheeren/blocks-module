<?php namespace Anomaly\BlocksModule;

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
     * The plugin functions.
     *
     * @var BlocksModulePluginFunctions
     */
    protected $functions;

    /**
     * Create a new BlocksModulePlugin instance.
     *
     * @param BlocksModulePluginFunctions $functions
     */
    public function __construct(BlocksModulePluginFunctions $functions)
    {
        $this->functions = $functions;
    }

    /**
     * Get the plugin functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('blocks_render', [$this->functions, 'render'], ['is_safe' => ['html']])
        ];
    }
}
