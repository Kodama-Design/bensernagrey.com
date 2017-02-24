<?php
namespace Sapling\ACF\Fields\Traits;

trait PlaceholderTrait
{
    protected $placeholder = '';

    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }

    public function setPlaceholder(string $placeholder)
    {
        $this->placeholder = $placeholder;
        return $this;
    }
}