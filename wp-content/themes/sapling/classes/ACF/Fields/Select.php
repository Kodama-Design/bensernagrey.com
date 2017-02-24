<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Fields\Traits\ChoicesTrait;
use Sapling\ACF\Fields\Traits\NullableTrait;
use Sapling\ACF\Fields\Traits\PlaceholderTrait;

class Select extends Base
{
    use PlaceholderTrait;
    use ChoicesTrait;
    use NullableTrait;

    protected $multiple = 0;
    protected $ui = 0;
    protected $ajax = 0;

    public function getType()
    {
        return 'select';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'choices' => $this->getChoices(),
                'allow_null' => $this->getNullable(),
                'multiple' => $this->getMultiple(),
                'ui' => $this->getUi(),
                'ajax' => $this->getAjax(),
                'placeholder' => $this->getPlaceholder(),
            ]
        );
    }

    public function getMultiple()
    {
        return $this->multiple;
    }

    public function setMultiple($multiple)
    {
        $this->multiple = $multiple;
        return $this;
    }

    public function getUi()
    {
        return $this->ui;
    }

    public function setUi($ui)
    {
        $this->ui = $ui;
        return $this;
    }

    public function getAjax()
    {
        return $this->ajax;
    }

    public function setAjax($ajax)
    {
        $this->ajax = $ajax;
        return $this;
    }
}