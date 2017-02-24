<?php
namespace Sapling\ACF\Fields\Traits;


trait MimeTrait
{
    /**
     * @var array list of file type extensions allowed when uploading
     */
    protected $mime_types = [];

    /**
     * @return string Comma separated list of file type extensions allowed when uploading
     */
    public function getMimeTypes(): string
    {
        return implode(', ', $this->mime_types);
    }

    /**
     * @param array $mime_types list of file type extensions allowed when uploading
     * @return $this
     */
    public function setMimeTypes(array $mime_types)
    {
        $this->mime_types = $mime_types;
        return $this;
    }
}