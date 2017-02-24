<?php
namespace Sapling\ACF\Fields\Traits;


trait WidthHeightTrait
{
    /**
     * @var int minimum width of image
     */
    protected $min_width = 0;

    /**
     * @var int maximum width of image
     */
    protected $max_width = 0;

    /**
     * @var int minimum height of image
     */
    protected $min_height = 0;

    /**
     * @var int maximum height of image
     */
    protected $max_height = 0;

    /**
     * @return int minimum width of image
     */
    public function getMinWidth(): int
    {
        return $this->min_width;
    }

    /**
     * @param int $min_width minimum width of image
     * @return $this
     */
    public function setMinWidth(int $min_width)
    {
        $this->min_width = $min_width;
        return $this;
    }

    /**
     * @return int maximum width of image
     */
    public function getMaxWidth(): int
    {
        return $this->max_width;
    }

    /**
     * @param int $max_width maximum width of image
     * @return $this
     */
    public function setMaxWidth(int $max_width)
    {
        $this->max_width = $max_width;
        return $this;
    }

    /**
     * @return int minimum height of image
     */
    public function getMinHeight(): int
    {
        return $this->min_height;
    }

    /**
     * @param int $min_height minimum height of image
     * @return $this
     */
    public function setMinHeight(int $min_height)
    {
        $this->min_height = $min_height;
        return $this;
    }

    /**
     * @return int maximum height of image
     */
    public function getMaxHeight(): int
    {
        return $this->max_height;
    }

    /**
     * @param int $max_height maximum height of image
     * @return $this
     */
    public function setMaxHeight(int $max_height)
    {
        $this->max_height = $max_height;
        return $this;
    }
}