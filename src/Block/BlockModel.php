<?php namespace Anomaly\BlocksModule\Block;

use Anomaly\BlocksModule\Block\Command\MakeBlock;
use Anomaly\BlocksModule\Block\Command\RenderBlock;
use Anomaly\BlocksModule\Block\Contract\BlockInterface;
use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\SettingsModule\Setting\Contract\SettingRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
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
     * The settings repository.
     *
     * @var SettingRepositoryInterface
     */
    protected $settings;

    /**
     * The configuration repository.
     *
     * @var ConfigurationRepositoryInterface
     */
    protected $configuration;

    /**
     * Create a new BlockModel instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->settings      = app(SettingRepositoryInterface::class);
        $this->configuration = app(ConfigurationRepositoryInterface::class);

        parent::__construct($attributes);
    }

    /**
     * Return the rendered block.
     *
     * @return string
     */
    public function render()
    {
        $this->make();

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
     * Return a setting value.
     *
     * @param $key
     * @return null|FieldTypePresenter
     */
    public function setting($key)
    {
        $extension = $this->getExtension();

        return $this->settings->presenter($extension->getNamespace($key), $this->getId());
    }

    /**
     * Return a configuration value.
     *
     * @param $key
     * @return null|FieldTypePresenter
     */
    public function configuration($key)
    {
        $extension = $this->getExtension();

        return $this->configuration->presenter($extension->getNamespace($key), $this->getId());
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
     * Get the related area.
     *
     * @return null|EntryInterface
     */
    public function getArea()
    {
        return $this->area;
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
