<?php namespace Anomaly\BlocksModule\Block\Type\Form;

/**
 * Class BlockTypeFormSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Type\Form
 */
class BlockTypeFormSections
{

    /**
     * Handle the sections.
     *
     * @param BlockTypeFormBuilder $builder
     */
    public function handle(BlockTypeFormBuilder $builder)
    {
        $block = $builder->getChildForm('block');
        $type  = $builder->getChildForm('type');

        $builder->setSections(
            [
                [
                    'tabs' => [
                        'block'   => [
                            'title'  => 'anomaly.module.blocks::tab.block',
                            'fields' => array_diff(
                                $block->getFormFieldNames(),
                                ['block_css', 'block_js', 'block_title', 'block_group']
                            )
                        ],
                        'content' => [
                            'title'  => 'anomaly.module.blocks::tab.content',
                            'fields' => $type ? $type->getFormFieldNames() : null
                        ],
                        'css'     => [
                            'title'  => 'anomaly.module.blocks::tab.css',
                            'fields' => [
                                'block_css'
                            ]
                        ],
                        'js'      => [
                            'title'  => 'anomaly.module.blocks::tab.js',
                            'fields' => [
                                'block_js'
                            ]
                        ],
                        'options' => [
                            'title'  => 'anomaly.module.blocks::tab.options',
                            'fields' => [
                                'block_title',
                                'block_group'
                            ]
                        ]
                    ]
                ]
            ]
        );
    }
}
