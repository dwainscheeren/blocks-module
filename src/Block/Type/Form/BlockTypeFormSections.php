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
                'block'   => [
                    'tabs' => [
                        'general' => [
                            'title'  => 'anomaly.module.blocks::form.general',
                            'fields' => array_diff(
                                $block->getFormFieldNames(),
                                ['block_title', 'block_group']
                            ),
                        ],
                        'options' => [
                            'title'  => 'anomaly.module.blocks::form.options',
                            'fields' => [
                                'block_title',
                                'block_group',
                            ],
                        ],
                    ],
                ],
                'content' => [
                    'fields' => $type ? $type->getFormFieldSlugs('type_') : null,
                ],
            ]
        );
    }
}
