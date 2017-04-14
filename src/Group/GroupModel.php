<?php namespace Anomaly\BlocksModule\Group;

use Anomaly\BlocksModule\Block\BlockCollection;
use Anomaly\BlocksModule\Block\BlockModel;
use Anomaly\BlocksModule\Group\Contract\GroupInterface;
use Anomaly\Streams\Platform\Model\Blocks\BlocksGroupsEntryModel;

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
     * @return BlockCollection
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * Return the blocks relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blocks()
    {
        return $this->hasMany(BlockModel::class, 'group_id');
    }
}
