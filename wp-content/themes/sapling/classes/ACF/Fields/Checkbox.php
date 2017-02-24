<?php
namespace Sapling\ACF\Fields;


use Sapling\ACF\Fields\Traits\ChoicesTrait;
use Sapling\ACF\Fields\Traits\LayoutTrait;

class Checkbox extends Base
{
    use ChoicesTrait;
    use LayoutTrait;

    public function getType()
    {
        return 'checkbox';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'choices' => $this->getChoices(),
                'layout' => $this->getLayout(),
            ]
        );
    }
}