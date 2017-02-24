<?php
namespace Sapling\ACF\Fields\Traits;

trait PrependTrait
{
    /**
     * @var string text to prepend to the input field
     */
    protected $prepend = '';

    /**
     * @return string text to prepend to the input field
     */
    public function getPrepend(): string
    {
        return $this->prepend;
    }

    /**
     * @param string $prepend text to prepend to the input field
     * @return $this
     */
    public function setPrepend(string $prepend)
    {
        $this->prepend = $prepend;
        return $this;
    }
}