<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Fields\Traits\AppendTrait;
use Sapling\ACF\Fields\Traits\MaxLengthTrait;
use Sapling\ACF\Fields\Traits\PlaceholderTrait;
use Sapling\ACF\Fields\Traits\PrependTrait;

class Text extends Base
{
    use AppendTrait;
    use PrependTrait;
    use PlaceholderTrait;
    use MaxLengthTrait;

    public function getType()
    {
        return 'text';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'placeholder' => $this->getPlaceholder(),
                'prepend' => $this->getPrepend(),
                'append' => $this->getAppend(),
                'maxlength' => $this->getMaxlength(),
            ]
        );
    }
}