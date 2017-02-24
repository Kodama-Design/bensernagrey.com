<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Fields\Traits\FormatTrait;
use Sapling\ACF\Fields\Traits\LibraryTrait;
use Sapling\ACF\Fields\Traits\MaxSizeTrait;
use Sapling\ACF\Fields\Traits\MimeTrait;
use Sapling\ACF\Fields\Traits\PreviewTrait;

class File extends Base
{
    use PreviewTrait;
    use LibraryTrait;
    use FormatTrait;
    use MaxSizeTrait;
    use MimeTrait;

    public function getType()
    {
        return 'file';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'return_format' => $this->getFormat(),
                'preview_size' => $this->getPreview(),
                'library' => $this->getLibrary(),
                'max_size' => $this->getMaxSize(),
                'mime_types' => $this->getMimeTypes(),
            ]
        );
    }
}