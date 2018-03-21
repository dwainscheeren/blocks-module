<?php namespace Anomaly\BlocksModule\Block\Contract;

use Anomaly\BlocksModule\Block\BlockExtension;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface BlockInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface BlockInterface extends EntryInterface
{

    /**
     * Return the rendered block.
     *
     * @return string
     */
    public function render();

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the extension.
     *
     * @return BlockExtension
     */
    public function getExtension();

    /**
     * Return the loaded extension.
     *
     * @return BlockExtension
     */
    public function extension();

    /**
     * Get the related entry.
     *
     * @return null|EntryInterface
     */
    public function getEntry();

    /**
     * Get the related entry's ID.
     *
     * @return null|int
     */
    public function getEntryId();


    /**
     * Get the content.
     *
     * @return string
     */
    public function getContent();

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content);
}
