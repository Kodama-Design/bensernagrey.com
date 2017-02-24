<?php
namespace Sapling\ACF\Fields\Traits;


trait MultipleTrait
{
    /** @var int Allow mulitple choices to be selected */
    protected $multiple = 0;

    /**
     * @return int Allow mulitple choices to be selected
     */
    public function getMultiple(): int
    {
        return $this->multiple;
    }

    /**
     * @param int $multiple Allow mulitple choices to be selected
     * @return $this
     */
    public function setMultiple(int $multiple)
    {
        $this->multiple = $multiple;
        return $this;
    }
}