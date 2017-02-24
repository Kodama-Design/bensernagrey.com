<?php
namespace Sapling\ACF\Fields\Traits;


trait NullableTrait
{
    /** @var int Allow null */
    protected $nullable = 0;

    /**
     * @return int Allow null
     */
    public function getNullable(): int
    {
        return $this->nullable;
    }

    /**
     * @param int $nullable Allow null
     * @return $this
     */
    public function setNullable(int $nullable)
    {
        $this->nullable = $nullable;
        return $this;
    }
}