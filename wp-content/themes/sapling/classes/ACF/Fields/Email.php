<?php
namespace Sapling\ACF\Fields;


use Sapling\ACF\Fields\Traits\AppendTrait;
use Sapling\ACF\Fields\Traits\PlaceholderTrait;
use Sapling\ACF\Fields\Traits\PrependTrait;

class Email extends Base
{
    use PrependTrait;
    use AppendTrait;
    use PlaceholderTrait;

    public function getType()
    {
        return 'email';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'placeholder' => $this->getPlaceholder(),
                'prepend' => $this->getPrepend(),
                'append' => $this->getAppend(),
            ]
        );
    }
}