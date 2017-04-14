<?php namespace Anomaly\BlocksModule;

use Anomaly\BlocksModule\Block\BlockRepository;
use Anomaly\BlocksModule\Block\Contract\BlockRepositoryInterface;
use Anomaly\BlocksModule\Group\Contract\GroupRepositoryInterface;
use Anomaly\BlocksModule\Group\GroupRepository;
use Anomaly\Streams\Platform\Addon\AddonCollection;
use Anomaly\Streams\Platform\Addon\AddonIntegrator;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Entry\EntryModel;

/**
 * Class BlocksModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule
 */
class BlocksModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        BlocksModulePlugin::class,
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/blocks'                  => 'Anomaly\BlocksModule\Http\Controller\Admin\BlocksController@index',
        'admin/blocks/choose'           => 'Anomaly\BlocksModule\Http\Controller\Admin\BlocksController@choose',
        'admin/blocks/create'           => 'Anomaly\BlocksModule\Http\Controller\Admin\BlocksController@create',
        'admin/blocks/edit/{id}'        => 'Anomaly\BlocksModule\Http\Controller\Admin\BlocksController@edit',
        'admin/blocks/groups'           => 'Anomaly\BlocksModule\Http\Controller\Admin\GroupsController@index',
        'admin/blocks/groups/create'    => 'Anomaly\BlocksModule\Http\Controller\Admin\GroupsController@create',
        'admin/blocks/groups/edit/{id}' => 'Anomaly\BlocksModule\Http\Controller\Admin\GroupsController@edit',
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        BlockRepositoryInterface::class => BlockRepository::class,
        GroupRepositoryInterface::class => GroupRepository::class,
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
            realpath(__DIR__ . '/../addons/anomaly/blocks-field_type/'),
            'anomaly.field_type.blocks',
            true,
            true
        );

        $addons->push($addon);

//        $model->bind(
//            'new_block_field_type_form_builder',
//            function (Container $container) {
//
//                /* @var EntryInterface $this */
//                $builder = $this->getBoundModelNamespace() . '\\Support\\BlocksFieldType\\FormBuilder';
//
//                if (class_exists($builder)) {
//                    return $container->make($builder);
//                }
//
//                return $container->make(FormBuilder::class);
//            }
//        );
    }

}
