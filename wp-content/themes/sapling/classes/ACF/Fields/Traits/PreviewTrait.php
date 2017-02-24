<?php
namespace Sapling\ACF\Fields\Traits;

trait PreviewTrait
{
    /**
     * @var string preview size of the image
     */
    protected $preview = 'thumbnail';

    /**
     * @return string preview size of the image
     */
    public function getPreview(): string
    {
        return $this->preview;
    }

    /**
     * @param string $preview preview size of the image
     * @return $this
     */
    public function setPreview(string $preview)
    {
        $this->preview = $preview;
        return $this;
    }
}