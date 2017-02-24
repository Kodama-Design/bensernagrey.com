<?php
namespace Sapling\ACF\Fields;


use Sapling\ACF\Fields\Traits\MaxLengthTrait;
use Sapling\ACF\Fields\Traits\PlaceholderTrait;

class Textarea extends Base
{
    use PlaceholderTrait;
    use MaxLengthTrait;

    protected $rows;
    protected $format;

    public function getType()
    {
        return 'textarea';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'placeholder' => $this->getPlaceholder(),
                'maxlength' => $this->getMaxlength(),
                'rows' => '',
                'new_lines' => '',
            ]
        );
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function setRows($rows)
    {
        $this->maxLength = $rows;
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