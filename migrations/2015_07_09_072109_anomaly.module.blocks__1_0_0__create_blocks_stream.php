<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlocks_1_0_0_CreateBlocksStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlocks_1_0_0_CreateBlocksStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'blocks',
        'title_column' => 'name',
        'locked'       => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name'  => [
            'required' => true,
            'unique'   => true
        ],
        'slug'  => [
            'required' => true,
            'unique'   => true
        ],
        'type'  => [
            'required' => true
        ],
        'entry' => [
            'required' => true
        ],
        'description',
        'group',
        'css',
        'js'
    ];

}
