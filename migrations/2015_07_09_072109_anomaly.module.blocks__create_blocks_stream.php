<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleBlocksCreateBlocksStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleBlocksCreateBlocksStream extends Migration
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
        'title',
        'css',
        'js'
    ];

}
