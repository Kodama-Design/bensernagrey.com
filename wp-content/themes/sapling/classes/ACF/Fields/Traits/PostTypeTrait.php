<?php
namespace Sapling\ACF\Fields\Traits;


trait PostTypeTrait
{
    /** @var array post types to filter the available choices */
    protected $post_type = [];

    /**
     * @return array post types to filter the available choices
     */
    public function getPostType()
    {
        return $this->post_type;
    }

    /**
     * @param array $post_type post types to filter the available choices
     * @return $this
     */
    public function setPostType(array $post_type)
    {
        $this->post_type = $post_type;
        return $this;
    }
}