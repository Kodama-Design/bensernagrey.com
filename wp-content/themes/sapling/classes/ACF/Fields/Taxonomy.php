<?php
namespace Sapling\ACF\Fields;


use Sapling\ACF\Fields\Traits\MultipleTrait;
use Sapling\ACF\Fields\Traits\NullableTrait;

class Taxonomy extends Base
{
    use NullableTrait;
    use MultipleTrait;

    /** @var string Specify the taxonomy to select terms from */
    protected $taxonomy = 'category';
    protected $field_type = 'checkbox';
    protected $load_save_terms = 0;
    protected $format = 'id';
    protected $add_term = 1;

    public function getType()
    {
        return 'taxonomy';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'taxonomy' => $this->getTaxonomy(),
                'allow_null' => $this->getNullable(),
                'return_format' => $this->getFormat(),
                'field_type' => $this->getFieldType(),
                'load_save_terms' => $this->getLoadSaveTerms(),
                'add_term' => $this->getAddTerm(),
            ]
        );
    }

    /**
     * @return string Specify the taxonomy to select terms from
     */
    public function getTaxonomy(): string
    {
        return $this->taxonomy;
    }

    /**
     * @param string $taxonomy Specify the taxonomy to select terms from
     * @return $this
     */
    public function setTaxonomy(string $taxonomy)
    {
        $this->taxonomy = $taxonomy;
        return $this;
    }

    public function getFieldType()
    {
        return $this->field_type;
    }

    public function setFieldType($field_type)
    {
        $this->field_type = $field_type;
        return $this;
    }

    public function getLoadSaveTerms()
    {
        return $this->load_save_terms;
    }

    public function setLoadSaveTerms($load_save_terms)
    {
        $this->load_save_terms = $load_save_terms;
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

    public function getAddTerm()
    {
        return $this->add_term;
    }

    public function setAddTerm($add_term)
    {
        $this->add_term = $add_term;
        return $this;
    }


}