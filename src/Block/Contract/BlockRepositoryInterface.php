<?php namespace Anomaly\BlocksModule\Block\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface BlockRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Block\Contract
 */
interface BlockRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Find a block by it's slug.
     *
     * @param $slug
     * @return null|BlockInterface
     */
    public function findBySlug($slug);

    /**
     * Sync an area's blocks.
     *
     * @param EntryInterface $area
     * @param array          $ids
     */
    public function sync(EntryInterface $area, array $ids);

}
