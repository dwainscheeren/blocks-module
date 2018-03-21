<?php namespace Anomaly\BlocksModule\Block\Command;

use Anomaly\BlocksModule\Block\BlockExtension;
use Anomaly\ConfigurationModule\Configuration\Form\ConfigurationFormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

/**
 * Class AddBlockForm
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class AddBlockForm
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
     */
    public function handle(ConfigurationFormBuilder $configuration)
    {
        //$configuration->setEntry($this->extension);
    }
}
