<?php

namespace Sapling\ACF\Fields\Traits;


trait LibraryTrait
{
    /**
     * @var string Restrict the image library
     */
    protected $library = 'all';

    /**
     * @return string Restrict the image library
     */
    public function getLibrary(): string
    {
        return $this->library;
    }

    /**
     * @param string $library Restrict the image library
     * @return $this
     */
    public function setLibrary(string $library)
    {
        $this->library = $library;
        return $this;
    }
}