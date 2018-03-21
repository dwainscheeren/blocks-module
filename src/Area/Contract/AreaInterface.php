<?php namespace Anomaly\BlocksModule\Area\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface AreaInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface AreaInterface extends EntryInterface
{

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription();

}
