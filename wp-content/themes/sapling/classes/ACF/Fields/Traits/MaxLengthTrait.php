<?php
namespace Sapling\ACF\Fields\Traits;

trait MaxLengthTrait
{
    /**
     * @var int maximum number of characters
     */
    protected $max_length = '';

    /**
     * @return int maximum number of characters
     */
    public function getMaxLength()
    {
        return $this->max_length;
    }

    /**
     * @param int $length maximum number of characters
     * @return $this
     */
    public function setMaxLength(int $length)
    {
        $this->max_length = $length;
        return $this;
    }
}