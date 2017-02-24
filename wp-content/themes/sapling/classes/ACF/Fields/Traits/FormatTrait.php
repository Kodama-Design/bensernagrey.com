<?php
namespace Sapling\ACF\Fields\Traits;


trait FormatTrait
{
    /**
     * @var string Specify the type of value returned by get_field()
     */
    protected $format = 'array';

    /**
     * @return string Specify the type of value returned by get_field()
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format Specify the type of value returned by get_field()
     * @return $this
     */
    public function setFormat(string $format)
    {
        $this->format = $format;
        return $this;
    }
}