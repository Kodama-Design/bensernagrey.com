<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Fields\Traits\AppendTrait;
use Sapling\ACF\Fields\Traits\MaxLengthTrait;
use Sapling\ACF\Fields\Traits\PlaceholderTrait;
use Sapling\ACF\Fields\Traits\PrependTrait;

class Date extends Base
{
    private $displayFormat = "m/d/y";
    private $returnFormat = "U";

    /**
     * @return string
     */
    public function getDisplayFormat()
    {
        return $this->displayFormat;
    }

    /**
     * @param string $displayFormat
     * @return Date
     */
    public function setDisplayFormat($displayFormat)
    {
        $this->displayFormat = $displayFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnFormat()
    {
        return $this->returnFormat;
    }

    /**
     * @param string $returnFormat
     * @return Date
     */
    public function setReturnFormat($returnFormat)
    {
        $this->returnFormat = $returnFormat;
        return $this;
    }

    public function getType()
    {
        return 'date_picker';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'display_format' => $this->getDisplayFormat(),
                'return_format' => $this->getReturnFormat(),
                'first_day' => 0,
            ]
        );
    }
}