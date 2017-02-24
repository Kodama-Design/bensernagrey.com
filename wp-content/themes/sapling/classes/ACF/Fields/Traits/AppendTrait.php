<?php
namespace Sapling\ACF\Fields\Traits;

trait AppendTrait
{
    /**
     * @var string text to append to the input field
     */
    protected $append = '';

    /**
     * @return string text to append to the input field
     */
    public function getAppend(): string
    {
        return $this->append;
    }

    /**
     * @param string $append text to append to the input field
     * @return $this
     */
    public function setAppend(string $append)
    {
        $this->append = $append;
        return $this;
    }
}