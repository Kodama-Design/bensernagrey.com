<?php
namespace Sapling\ACF\Fields\Traits;


trait MaxSizeTrait
{
    /**
     * @var int Specify the maximum filesize in MB in px allowed when uploading. The unit may also be included. eg. '256KB'
     */
    protected $max_size = 0;

    /**
     * @return int Specify the maximum filesize in MB in px allowed when uploading. The unit may also be included. eg. '256KB'
     */
    public function getMaxSize()
    {
        return $this->max_size;
    }

    /**
     * @param string $max_size Specify the maximum filesize in MB in px allowed when uploading. The unit may also be included. eg. '256KB'
     * @return $this
     */
    public function setMaxSize($max_size)
    {
        $this->max_size = $max_size;
        return $this;
    }

}