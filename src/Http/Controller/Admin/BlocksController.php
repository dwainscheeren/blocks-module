<?php namespace Anomaly\BlocksModule\Http\Controller\Admin;

use Anomaly\BlocksModule\Block\Contract\BlockInterface;
use Anomaly\BlocksModule\Block\Contract\BlockRepositoryInterface;
use Anomaly\BlocksModule\Block\Form\BlockFormBuilder;
use Anomaly\BlocksModule\Block\Table\BlockTableBuilder;
use Anomaly\BlocksModule\Block\Type\Form\BlockTypeFormBuilder;
use Anomaly\ConfigurationModule\Configuration\Form\ConfigurationFormBuilder;
use Anomaly\Streams\Platform\Addon\Extension\Extension;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class BlocksController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Http\Controller\Admin
 */
class BlocksController extends AdminController
{

    /**
     * Return an index of existing blocks.
     *
     * @param BlockTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(BlockTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the modal to select the type of block to create.
     *
     * @param ExtensionCollection $extensions
     * @return \Illuminate\View\View
     */
    public function choose(ExtensionCollection $extensions)
    {
        return view(
            'module::admin/blocks/choose_block_type',
            [
                'blocks' => $extensions->search('anomaly.module.blocks::block.*')->enabled(),
            ]
        );
    }

    /**
     * Return the form to create a new block.
     *
     * @param BlockFormBuilder     $block
     * @param BlockTypeFormBuilder $form
     * @param ExtensionCollection  $blocks
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(
        BlockFormBuilder $block,
        BlockTypeFormBuilder $form,
        ExtensionCollection $blocks
    ) {
        /* @var Extension $type */
        $type = $blocks->get($this->request->get('type'));

        $builder   = explode('\\', get_class($type));
        $extension = array_pop($builder);
        $builder   = implode('\\', $builder);
        $builder   = $builder . '\Form\\' . substr($extension, 0, -9) . 'FormBuilder';

        if (class_exists($builder)) {

            $builder = app($builder);

            $form->addForm('type', $builder);
        }

        $form->addForm('block', $block->setType($type));

        return $form->render();
    }

    /**
     * Return the form to edit an existing block.
     *
     * @param BlockFormBuilder         $block
     * @param BlockTypeFormBuilder     $form
     * @param BlockRepositoryInterface $blocks
     * @param ConfigurationFormBuilder $configuration
     * @param                          $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(
        BlockFormBuilder $block,
        BlockTypeFormBuilder $form,
        BlockRepositoryInterface $blocks,
        $id
    ) {
        /* @var BlockInterface $entry */
        $entry = $blocks->find($id);
        $type  = $entry->getType();

        $builder   = explode('\\', get_class($type));
        $extension = array_pop($builder);
        $builder   = implode('\\', $builder);
        $builder   = $builder . '\Form\\' . substr($extension, 0, -9) . 'FormBuilder';

        if (class_exists($builder)) {

            $builder = app($builder);

            $form->addForm('type', $builder->setEntry($entry->getEntryId()));
        }

        $form->addForm('block', $block->setEntry($id)->setType($type));

        return $form->render();
    }
}
