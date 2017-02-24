<?php
namespace Sapling\ACF\Fields;


class TrueFalse extends Base
{
    protected $message;

    public function getType()
    {
        return 'true_false';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'message' => $this->getMessage(),
            ]
        );
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}