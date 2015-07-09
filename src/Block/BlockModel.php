<?php namespace Anomaly\BlocksModule\Block;

use Anomaly\BlocksModule\Block\Contract\BlockInterface;
use Anomaly\BlocksModule\Type\BlockTypeExtension;
use Anomaly\Streams\Platform\Model\Blocks\BlocksBlocksEntryModel;

/**
 * Class BlockModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Block
 */
class BlockModel extends BlocksBlocksEntryModel implements BlockInterface
{

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the type.
     *
     * @return BlockTypeExtension
     */
    public function getType()
    {
        return $this->type;
    }
}
