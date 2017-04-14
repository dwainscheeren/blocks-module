<?php namespace Anomaly\BlocksModule\Group\Contract;

/**
 * Interface GroupRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Group\Contract
 */
interface GroupRepositoryInterface
{

    /**
     * Find a group by it's slug.
     *
     * @param $slug
     * @return GroupInterface|null
     */
    public function findBySlug($slug);
}
