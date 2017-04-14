<?php namespace Anomaly\BlocksModule\Block\Contract;

use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface BlockInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Block\Contract
 */
interface BlockInterface
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
     * Get the type.
     *
     * @return Extension
     */
    public function getType();

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
