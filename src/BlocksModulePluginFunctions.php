<?php namespace Anomaly\BlocksModule;

use Anomaly\BlocksModule\Block\Contract\BlockRepositoryInterface;
use Anomaly\BlocksModule\Group\Contract\GroupRepositoryInterface;
use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;

/**
 * Class BlocksModulePluginFunctions
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule
 */
class BlocksModulePluginFunctions
{

    /**
     * The block repository.
     *
     * @var BlockRepositoryInterface
     */
    protected $blocks;

    /**
     * The group repository.
     *
     * @var GroupRepositoryInterface
     */
    protected $groups;

    /**
     * The configuration repository.
     *
     * @var ConfigurationRepositoryInterface
     */
    protected $configuration;

    /**
     * Create a new BlocksModulePluginFunctions instance.
     *
     * @param BlockRepositoryInterface $blocks
     * @param GroupRepositoryInterface $groups
     */
    function __construct(BlockRepositoryInterface $blocks, GroupRepositoryInterface $groups)
    {
        $this->blocks = $blocks;
        $this->groups = $groups;
    }

    /**
     * Render a block
     *
     * @param $slug
     * @return null|string
     */
    public function render($slug)
    {
        if (!$block = $this->blocks->findBySlug($slug)) {
            return null;
        }

        $type = $block->getType();

        return view($type->getNamespace('block'));
    }
}
