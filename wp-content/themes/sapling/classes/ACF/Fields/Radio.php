<?php
namespace Sapling\ACF\Fields;


use Sapling\ACF\Fields\Traits\ChoicesTrait;
use Sapling\ACF\Fields\Traits\LayoutTrait;

class Radio extends Base
{
    use ChoicesTrait;
    use LayoutTrait;

    protected $other = 0;
    protected $save_other = 0;

    public function getType()
    {
        return 'radio';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'choices' => $this->getChoices(),
                'other_choice',
                'save_other_choice',
                'layout'
            ]
        );
    }

    public function getOther()
    {
        return $this->other;
    }

    public function setOther($other)
    {
        $this->other = $other;
        return $this;
    }

    public function getSaveOther()
    {
        return $this->save_other;
    }

    public function setSaveOther($save_other)
    {
        $this->save_other = $save_other;
        return $this;
    }
}