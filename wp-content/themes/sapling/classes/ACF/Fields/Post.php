<?php
namespace Sapling\ACF\Fields;


use Sapling\ACF\Fields\Traits\MultipleTrait;
use Sapling\ACF\Fields\Traits\NullableTrait;
use Sapling\ACF\Fields\Traits\PostTypeTrait;
use Sapling\ACF\Fields\Traits\TaxonomyTrait;

class Post extends Base
{
    use PostTypeTrait;
    use NullableTrait;
    use TaxonomyTrait;
    use MultipleTrait;
    
    protected $format = 'object';

    public function getType()
    {
        return 'post_object';
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
                'return_format' => $this->getFormat(),
            ]
        );
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }
}