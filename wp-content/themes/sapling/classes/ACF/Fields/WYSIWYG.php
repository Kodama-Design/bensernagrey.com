<?php
namespace Sapling\ACF\Fields;


class WYSIWYG extends Base
{
    protected $tabs = 'all';
    protected $toolbar = 'full';
    protected $upload = 1;

    public function getType()
    {
        return 'wysiwyg';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'tabs' => $this->getTabs(),
                'toolbar' => $this->getToolbar(),
                'media_upload' => $this->getUpload(),
            ]
        );
    }

    public function getTabs()
    {
        return $this->tabs;
    }

    public function setTabs($tabs)
    {
        $this->tabs = $tabs;
        return $this;
    }

    public function getToolbar()
    {
        return $this->toolbar;
    }

    public function setToolbar($toolbar)
    {
        $this->toolbar = $toolbar;
        return $this;
    }

    public function getUpload()
    {
        return $this->upload;
    }

    public function setUpload($upload)
    {
        $this->upload = $upload;
        return $this;
    }
}