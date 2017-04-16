<?php namespace Anomaly\BlocksModule\Group;

use Anomaly\BlocksModule\Group\Contract\GroupInterface;
use Anomaly\Streams\Platform\Model\Blocks\BlocksGroupsEntryModel;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class GroupModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Group
 */
class GroupModel extends BlocksGroupsEntryModel implements GroupInterface
{

    /**
     * Get the related blocks.
     *
     * @return Collection
     */
    public function getBlocks()
    {
        return $this->blocks;
    }
}
