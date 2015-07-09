<?php namespace Anomaly\BlocksModule\Block\Form;

use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;

/**
 * Class BlockFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Block\Form
 */
class BlockFormFields
{

    /**
     * Handle the form fields.
     *
     * @param BlockFormBuilder $builder
     */
    public function handle(BlockFormBuilder $builder)
    {
        $fields = [
            'type' => [
                'value'    => $builder->getOption('type'),
                'disabled' => 'edit',
                'config'   => [
                    'options' => function (ExtensionCollection $extensions) {

                        $extensions = $extensions->search('anomaly.module.blocks::block.*');

                        return $extensions->lists('name', 'namespace');
                    }
                ]
            ],
            'name',
            'slug' => [
                'disabled' => 'edit'
            ],
            'description',
            'group'
        ];

        $builder->setFields($fields);
    }
}
