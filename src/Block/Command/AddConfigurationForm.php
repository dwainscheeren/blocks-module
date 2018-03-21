<?php namespace Anomaly\BlocksModule\Block\Command;

use Anomaly\BlocksModule\Block\BlockExtension;
use Anomaly\BlocksModule\Block\Contract\BlockInterface;
use Anomaly\ConfigurationModule\Configuration\Form\ConfigurationFormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;
use Illuminate\Contracts\Config\Repository;

/**
 * Class AddConfigurationForm
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AddConfigurationForm
{

    /**
     * The block form builder.
     *
     * @var MultipleFormBuilder
     */
    protected $builder;

    /**
     * The block extension.
     *
     * @var BlockExtension
     */
    protected $extension;

    /**
     * Create a new GetBlockStream instance.
     *
     * @param MultipleFormBuilder $builder
     * @param BlockExtension      $extension
     */
    public function __construct(MultipleFormBuilder $builder, BlockExtension $extension)
    {
        $this->builder   = $builder;
        $this->extension = $extension;
    }

    /**
     * Handle the command.
     *
     * @param ConfigurationFormBuilder $configuration
     * @param Repository               $config
     */
    public function handle(ConfigurationFormBuilder $configuration, Repository $config)
    {
        $configuration->setEntry($this->extension->getNamespace());

        $this->builder->addForm('configuration', $configuration);

        if (!$sections = $config->get($this->extension->getNamespace('configuration/sections'))) {
            $sections = array_keys($config->get($this->extension->getNamespace('configuration'), []));
        }

        $this->builder->mergeSections($sections);

        $this->builder->on('saved_block', function() use ($configuration) {

            $configuration->setScope($this->builder->getChildFormEntryId('block'));
        });
    }
}
