<?php namespace Anomaly\BlocksModule\Block\Command;

use Anomaly\BlocksModule\Block\BlockPresenter;
use Anomaly\BlocksModule\Block\Contract\BlockInterface;
use Anomaly\BlocksModule\Block\Contract\BlockRepositoryInterface;

/**
 * Class GetBlock
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetBlock
{

    /**
     * The block identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetBlock instance.
     *
     * @param $identifier
     */
    public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Handle the command.
     *
     * @param BlockRepositoryInterface $blocks
     * @return BlockInterface|null
     */
    public function handle(BlockRepositoryInterface $blocks)
    {
        if (is_numeric($this->identifier)) {
            return $blocks->find($this->identifier);
        }

        if (is_string($this->identifier)) {
            return $blocks->findBySlug($this->identifier);
        }

        if ($this->identifier instanceof BlockInterface) {
            return $this->identifier;
        }

        if ($this->identifier instanceof BlockPresenter) {
            return $this->identifier->getObject();
        }

        return null;
    }
}
