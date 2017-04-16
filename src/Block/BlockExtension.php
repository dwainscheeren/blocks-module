<?php namespace Anomaly\BlocksModule\Block;

use Anomaly\BlocksModule\Block\Command\GetBlockStream;
use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Class BlockExtension
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BlockExtension extends Extension
{

    /**
     * Get the block extension stream.
     *
     * @return StreamInterface
     */
    public function getStream()
    {
        return $this->dispatch(new GetBlockStream($this));
    }
}
