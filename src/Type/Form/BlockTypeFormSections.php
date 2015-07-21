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
        $block         = $builder->getChildForm('block');
        $configuration = $builder->getChildForm('configuration');

        $builder->setSections(
            [
                [
                    'tabs' => [
                        'block'         => [
                            'title'  => 'anomaly.module.blocks::tab.block',
                            'fields' => $block->getFormFieldNames()
                        ],
                        'configuration' => [
                            'title'  => 'anomaly.module.blocks::tab.configuration',
                            'fields' => $configuration->getFormFieldNames()
                        ]
                    ]
                ]
            ]
        );
    }
}
