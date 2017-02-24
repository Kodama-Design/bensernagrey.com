<?php
namespace Sapling\ACF\Fields;


use Sapling\ACF\Fields\Traits\MultipleTrait;
use Sapling\ACF\Fields\Traits\NullableTrait;

class User extends Base
{
    use NullableTrait;
    use MultipleTrait;

    protected $role = [];

    public function getType()
    {
        return 'user';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'allow_null' => $this->getNullable(),
                'multiple' => $this->getMultiple(),
                'role' => $this->getRole(),
            ]
        );
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }
}