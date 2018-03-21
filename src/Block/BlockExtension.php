<?php namespace Anomaly\BlocksModule\Block;

use Anomaly\BlocksModule\Block\Command\AddBlockForm;
use Anomaly\BlocksModule\Block\Command\AddConfigurationForm;
use Anomaly\BlocksModule\Block\Contract\BlockInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

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
     * The block instance.
     *
     * @var null|BlockInterface
     */
    protected $block;

    /**
     * Extend the form builder.
     *
     * @param MultipleFormBuilder $builder
     */
    public function extend(MultipleFormBuilder $builder)
    {
        $this->dispatch(new AddBlockForm($builder, $this));
        $this->dispatch(new AddConfigurationForm($builder, $this));
    }

    /**
     * Get the block.
     *
     * @return null|BlockInterface
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Set the block.
     *
     * @param BlockInterface $block
     * @return $this
     */
    public function setBlock(BlockInterface $block)
    {
        $this->block = $block;

        return $this;
    }
}
