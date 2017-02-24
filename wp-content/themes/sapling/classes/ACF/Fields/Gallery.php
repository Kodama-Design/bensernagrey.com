<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Fields\Traits\FormatTrait;
use Sapling\ACF\Fields\Traits\LibraryTrait;
use Sapling\ACF\Fields\Traits\MaxSizeTrait;
use Sapling\ACF\Fields\Traits\MimeTrait;
use Sapling\ACF\Fields\Traits\PreviewTrait;
use Sapling\ACF\Fields\Traits\WidthHeightTrait;

class Gallery extends Base
{
    use PreviewTrait;
    use LibraryTrait;
    use FormatTrait;
    use WidthHeightTrait;
    use MaxSizeTrait;
    use MimeTrait;

    protected $min = 0;
    protected $max = 0;
    protected $mime_types = [];

    public function getType()
    {
        return 'gallery';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'min' => $this->getMin(),
                'max' => $this->getMax(),
                'preview_size' => $this->getPreview(),
                'library' => $this->getLibrary(),
                'min_width' => $this->getMinWidth(),
                'min_height' => $this->getMinHeight(),
                'max_width' => $this->getMaxWidth(),
                'max_height' => $this->getMaxHeight(),
                'max_size' => $this->getMaxSize(),
                'mime_types' => $this->getMimeTypes(),
            ]
        );
    }

    public function getMin()
    {
        return $this->min;
    }

    public function setMin($min)
    {
        $this->min = $min;
        return $this;
    }

    public function getMax()
    {
        return $this->max;
    }

    public function setMax($max)
    {
        $this->max = $max;
        return $this;
    }
}