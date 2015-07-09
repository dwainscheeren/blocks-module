<?php namespace Anomaly\BlocksModule\Block\Contract;

use Anomaly\BlocksModule\Type\BlockTypeExtension;

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
}
