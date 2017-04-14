<?php namespace Anomaly\BlocksModule\Group\Contract;

use Anomaly\BlocksModule\Block\BlockCollection;

/**
 * Interface GroupInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Group\Contract
 */
interface GroupInterface
{

    /**
     * Get the related blocks.
     *
     * @return BlockCollection
     */
    public function getBlocks();
}
