<?php namespace Anomaly\BlocksModule\Block;

use Anomaly\BlocksModule\Block\Command\MakeBlock;
use Anomaly\BlocksModule\Block\Command\RenderBlock;
use Anomaly\BlocksModule\Block\Contract\BlockInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\Blocks\BlocksBlocksEntryModel;

/**
 * Class BlockModel
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
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
     * Make the block content.
     *
     * @return $this
     */
    public function make()
    {
        $this->dispatch(new MakeBlock($this));

        return $this;
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
     * Get the extension.
     *
     * @return BlockExtension
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Return the loaded extension.
     *
     * @return BlockExtension
     */
    public function extension()
    {
        return $this
            ->getExtension()
            ->setBlock($this);
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
