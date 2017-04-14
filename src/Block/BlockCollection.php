<?php namespace Anomaly\BlocksModule\Block;

use Anomaly\BlocksModule\Block\Command\GetBlock;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class BlockCollection
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BlockCollection extends EntryCollection
{

    use DispatchesJobs;

    /**
     * Return the string value.
     *
     * @return string
     */
    public function __toString()
    {
        return implode(
            "\n\n",
            $this->each(
                function ($item) {

                    if (!$block = $this->dispatch(new GetBlock($item))) {
                        return null;
                    }

                    return $block->render();
                }
            )->all()
        );
    }
}
