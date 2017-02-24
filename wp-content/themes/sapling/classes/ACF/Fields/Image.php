<?php
namespace Sapling\ACF\Fields;


use Sapling\ACF\Fields\Traits\FormatTrait;
use Sapling\ACF\Fields\Traits\LibraryTrait;
use Sapling\ACF\Fields\Traits\MaxSizeTrait;
use Sapling\ACF\Fields\Traits\MimeTrait;
use Sapling\ACF\Fields\Traits\PreviewTrait;
use Sapling\ACF\Fields\Traits\WidthHeightTrait;

class Image extends Base
{
    use PreviewTrait;
    use LibraryTrait;
    use FormatTrait;
    use WidthHeightTrait;
    use MaxSizeTrait;
    use MimeTrait;

    public function getType()
    {
        return 'image';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'return_format' => $this->getFormat(),
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

}