<?php namespace Anomaly\BlocksModule\Group\Command;

use Anomaly\BlocksModule\Group\Contract\GroupInterface;
use Anomaly\BlocksModule\Group\Contract\GroupRepositoryInterface;
use Anomaly\BlocksModule\Group\GroupPresenter;

/**
 * Class GetGroup
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetGroup
{

    /**
     * The block identifier.
     *
     * @var mixed
     */
    protected $identifier;

    /**
     * Create a new GetGroup instance.
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
     * @param GroupRepositoryInterface $groups
     * @return GroupInterface|null
     */
    public function handle(GroupRepositoryInterface $groups)
    {
        if (is_numeric($this->identifier)) {
            return $groups->find($this->identifier);
        }

        if (is_string($this->identifier)) {
            return $groups->findBySlug($this->identifier);
        }

        if ($this->identifier instanceof GroupInterface) {
            return $this->identifier;
        }

        if ($this->identifier instanceof GroupPresenter) {
            return $this->identifier->getObject();
        }

        return null;
    }
}
