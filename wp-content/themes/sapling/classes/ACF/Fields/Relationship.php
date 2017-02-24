<?php
namespace Sapling\ACF\Fields;


use Sapling\ACF\Fields\Traits\MultipleTrait;
use Sapling\ACF\Fields\Traits\PostTypeTrait;
use Sapling\ACF\Fields\Traits\TaxonomyTrait;

class Relationship extends Base
{
    use PostTypeTrait;
    use TaxonomyTrait;

    protected $filters = ['search', 'post_type', 'taxonomy'];
    protected $elements = [];
    protected $min = 0;
    protected $max = 0;
    protected $format = 'object';

    public function getType()
    {
        return 'relationship';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'post_type' => $this->getPostType(),
                'taxonomy' => $this->getTaxonomy(),
                'return_format' => $this->getFormat(),
                'filters' => $this->getFilters(),
                'elements' => $this->getElements(),
                'min' => $this->getMin(),
                'max' => $this->getMax(),
            ]
        );
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function setFilters($filters)
    {
        $this->filters = $filters;
        return $this;
    }

    public function getElements()
    {
        return $this->elements;
    }

    public function setElements($elements)
    {
        $this->elements = $elements;
        return $this;
    }

    public function getMin()
    {
        return $this->min;
    }

    public function setMin($min)
    {
        $this->min = $min;
        return $this;
    }

    public function getMax()
    {
        return $this->max;
    }

    public function setMax($max)
    {
        $this->max = $max;
        return $this;
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