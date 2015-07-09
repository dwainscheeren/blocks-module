<?php namespace Anomaly\BlocksModule\Http\Controller\Admin;

use Anomaly\BlocksModule\Group\Form\GroupFormBuilder;
use Anomaly\BlocksModule\Group\Table\GroupTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class GroupsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Http\Controller\Admin
 */
class GroupsController extends AdminController
{

    /**
     * Return an index of existing groups.
     *
     * @param GroupTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(GroupTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the form for creating a new group.
     *
     * @param GroupFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(GroupFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return the form for editing an existing group.
     *
     * @param GroupFormBuilder $form
     * @param                  $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(GroupFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
