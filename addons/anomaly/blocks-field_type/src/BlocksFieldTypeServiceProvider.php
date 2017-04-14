<?php namespace Anomaly\BlocksFieldType;

use Anomaly\Streams\Platform\Addon\AddonCollection;
use Anomaly\Streams\Platform\Addon\AddonIntegrator;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryModel;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Contracts\Container\Container;

/**
 * Class BlocksFieldTypeServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\BlocksFieldType
 */
class BlocksFieldTypeServiceProvider extends AddonServiceProvider
{

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'blocks-field_type/choose/{field}'        => 'Anomaly\BlocksFieldType\Http\Controller\BlocksController@choose',
        'blocks-field_type/form/{field}/{stream}' => 'Anomaly\BlocksFieldType\Http\Controller\BlocksController@form',
    ];

    /**
     * Register the addon.
     *
     * @param AddonIntegrator $integrator
     * @param AddonCollection $addons
     * @param EntryModel      $model
     */
    public function register(
        AddonIntegrator $integrator,
        AddonCollection $addons,
        EntryModel $model
    ) {
        $addon = $integrator->register(
            realpath(__DIR__ . '/../addons/anomaly/blockss-module/'),
            'anomaly.module.blockss',
            true,
            true
        );

        $addons->push($addon);

        $model->bind(
            'new_blocks_field_type_form_builder',
            function (Container $container) {

                /* @var EntryInterface $this */
                $builder = $this->getBoundModelNamespace() . '\\Support\\BlocksFieldType\\FormBuilder';

                if (class_exists($builder)) {
                    return $container->make($builder);
                }

                return $container->make(FormBuilder::class);
            }
        );
    }
}
