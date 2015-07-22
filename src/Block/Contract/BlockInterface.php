<?php namespace Anomaly\BlocksModule\Block\Contract;

use Anomaly\BlocksModule\Block\Type\BlockTypeExtension;
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
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the type.
     *
     * @return BlockTypeExtension
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
}
