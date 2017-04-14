<?php namespace Anomaly\BlocksModule\Group;

use Anomaly\BlocksModule\Group\Contract\GroupInterface;
use Anomaly\BlocksModule\Group\Contract\GroupRepositoryInterface;

/**
 * Class GroupRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Group
 */
class GroupRepository implements GroupRepositoryInterface
{

    /**
     * The group model.
     *
     * @var GroupModel
     */
    protected $model;

    /**
     * Create a new GroupRepository instance.
     *
     * @param GroupModel $model
     */
    public function __construct(GroupModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a group by it's slug.
     *
     * @param $slug
     * @return GroupInterface|null
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
