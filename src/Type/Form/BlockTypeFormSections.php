<?php namespace Anomaly\BlocksModule\Type\Form;

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
                            'fields' => $block->getFormFieldNames()
                        ],
                        'content' => [
                            'title'  => 'anomaly.module.blocks::tab.content',
                            'fields' => $type->getFormFieldNames()
                        ]
                    ]
                ]
            ]
        );
    }
}
