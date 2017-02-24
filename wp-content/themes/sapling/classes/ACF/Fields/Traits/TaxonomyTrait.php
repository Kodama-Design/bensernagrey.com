<?php
namespace Sapling\ACF\Fields\Traits;

trait TaxonomyTrait
{
    /**
     * @var array list of taxonomies to filter the available choices
     */
    protected $taxonomy = [];

    /**
     * @return array list of taxonomies to filter the available choices
     */
    public function getTaxonomy(): array
    {
        return $this->taxonomy;
    }

    /**
     * @param array $taxonomy list of taxonomies to filter the available choices
     * @return $this
     */
    public function setTaxonomy(array $taxonomy)
    {
        $this->taxonomy = $taxonomy;
        return $this;
    }
}