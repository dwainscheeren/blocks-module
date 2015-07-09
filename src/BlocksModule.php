<?php namespace Anomaly\BlocksModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class BlocksModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule
 */
class BlocksModule extends Module
{

    /**
     * The module addon.
     *
     * @var string
     */
    protected $icon = 'cubes';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'blocks' => [
            'buttons' => [
                'new_block' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/blocks/choose'
                ]
            ]
        ],
        'groups' => [
            'buttons' => [
                'new_group'
            ]
        ]
    ];

}
