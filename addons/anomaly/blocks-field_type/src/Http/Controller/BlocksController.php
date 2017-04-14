<?php namespace Anomaly\BlocksFieldType\Http\Controller;

use Anomaly\BlocksFieldType\BlocksFieldType;
use Anomaly\Streams\Platform\Field\Contract\FieldInterface;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;

/**
 * Class BlocksController
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class BlocksController extends PublicController
{

    /**
     * Choose what kind of row to add.
     *
     * @param FieldRepositoryInterface $fields
     * @param                          $field
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function choose(FieldRepositoryInterface $fields, StreamRepositoryInterface $streams, $field)
    {
        /* @var FieldInterface $field */
        $field = $fields->find($field);

        /* @var BlocksFieldType $type */
        $type = $field->getType();

        $related = $type->config('related', []);

        if (!$related) {
            $related = array_map(
                function (StreamInterface $stream) {
                    return $stream->getEntryModelName();
                },
                $streams->findAllByNamespace('blocks')->all()
            );
        }

        return $this->view->make(
            'anomaly.field_type.blocks::choose',
            [
                'blockss' => array_map(
                    function ($model) {
                        return app($model);
                    },
                    $related
                ),
            ]
        );
    }

    /**
     * Return a form row.
     *
     * @param FieldRepositoryInterface  $fields
     * @param StreamRepositoryInterface $streams
     * @param                           $field
     * @param                           $stream
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function form(
        FieldRepositoryInterface $fields,
        StreamRepositoryInterface $streams,
        $field,
        $stream
    ) {
        /* @var FieldInterface $field */
        /* @var StreamInterface $stream */
        $field  = $fields->find($field);
        $stream = $streams->find($stream);

        /* @var BlocksFieldType $type */
        $type = $field->getType();

        $type->setPrefix($this->request->get('prefix'));

        return $type
            ->form($field, $stream, $this->request->get('instance'))
            ->addFormData('field_type', $type)
            ->render();
    }
}
