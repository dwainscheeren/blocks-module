<?php namespace Anomaly\BlocksModule\Block\Form;

use Anomaly\BlocksModule\Area\Contract\AreaInterface;
use Anomaly\BlocksModule\Block\BlockExtension;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class BlockFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\BlocksModule\Block\Form
 */
class BlockFormBuilder extends FormBuilder
{

    /**
     * The area instance.
     *
     * @var null|AreaInterface
     */
    protected $area = null;

    /**
     * The block extension.
     *
     * @var null|BlockExtension
     */
    protected $extension = null;

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'title',
    ];

    /**
     * Fired just before
     * saving the form entry.
     */
    public function onSaving()
    {
        $area      = $this->getArea();
        $extension = $this->getExtension();

        $this->setFormEntryAttribute('area', $area);
        $this->setFormEntryAttribute('extension', $extension);
    }

    /**
     * Get the area.
     *
     * @return AreaInterface|null
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set the area.
     *
     * @param AreaInterface $area
     * @return $this
     */
    public function setArea(AreaInterface $area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get the block extension.
     *
     * @return BlockExtension|null
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set the block type.
     *
     * @param BlockExtension $extension
     * @return $this
     */
    public function setExtension(BlockExtension $extension)
    {
        $this->extension = $extension;

        return $this;
    }
}
