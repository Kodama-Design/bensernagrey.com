<?php
namespace Sapling\ACF\Fields;


use Sapling\ACF\Fields\Traits\MultipleTrait;
use Sapling\ACF\Fields\Traits\NullableTrait;
use Sapling\ACF\Fields\Traits\PostTypeTrait;
use Sapling\ACF\Fields\Traits\TaxonomyTrait;

class PageLink extends Base
{
    use PostTypeTrait;
    use NullableTrait;
    use TaxonomyTrait;
    use MultipleTrait;

    public function getType()
    {
        return 'page_link';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'post_type' => $this->getPostType(),
                'taxonomy' => $this->getTaxonomy(),
                'allow_null' => $this->getNullable(),
                'multiple' => $this->getMultiple(),
            ]
        );
    }
}