<?php namespace Anomaly\BlocksModule\Area;

use Anomaly\BlocksModule\Area\Contract\AreaInterface;
use Anomaly\Streams\Platform\Model\Blocks\BlocksAreasEntryModel;

/**
 * Class AreaModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AreaModel extends BlocksAreasEntryModel implements AreaInterface
{

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
