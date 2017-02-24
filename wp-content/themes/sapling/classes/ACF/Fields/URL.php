<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Fields\Traits\PlaceholderTrait;

class URL extends Base
{
    use PlaceholderTrait;

    public function getType()
    {
        return 'url';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'placeholder' => $this->getPlaceholder(),
            ]
        );
    }
}