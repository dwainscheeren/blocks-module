<?php namespace Anomaly\BlocksModule\Block;

use Anomaly\BlocksModule\Block\Command\RenderBlock;
use Anomaly\BlocksModule\Block\Contract\BlockInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
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
     * Return the rendered block.
     *
     * @return string
     */
    public function render()
    {
        return $this->dispatch(new RenderBlock($this));
    }

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
     * @return Extension
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the related entry.
     *
     * @return null|EntryInterface
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Get the related entry ID.
     *
     * @return null|int
     */
    public function getEntryId()
    {
        return $this->entry_id;
    }

    /**
     * Get the content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
