<?php namespace Anomaly\BlocksModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

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
     * The routes array.
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
        'admin/blocks/groups/edit/{id}' => 'Anomaly\BlocksModule\Http\Controller\Admin\GroupsController@edit'
    ];

    /**
     * The bindings array.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\BlocksModule\Block\Contract\BlockRepositoryInterface' => 'Anomaly\BlocksModule\Block\BlockRepository',
        'Anomaly\BlocksModule\Group\Contract\GroupRepositoryInterface' => 'Anomaly\BlocksModule\Group\GroupRepository'
    ];

}
