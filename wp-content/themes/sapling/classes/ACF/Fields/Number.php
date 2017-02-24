<?php
namespace Sapling\ACF\Fields;

use Sapling\ACF\Fields\Traits\AppendTrait;
use Sapling\ACF\Fields\Traits\PlaceholderTrait;
use Sapling\ACF\Fields\Traits\PrependTrait;

class Number extends Base
{
    use PrependTrait;
    use AppendTrait;
    use PlaceholderTrait;

    protected $min;
    protected $max;
    protected $step;

    public function getType()
    {
        return 'number';
    }

    public function build()
    {
        return array_merge(
            parent::build(),
            [
                'placeholder' => $this->getPlaceholder(),
                'prepend' => $this->getPrepend(),
                'append' => $this->getAppend(),
                'min' => $this->getMin(),
                'max' => $this->getMax(),
                'step' => $this->getStep(),
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

    public function getStep()
    {
        return $this->step;
    }

    public function setStep($step)
    {
        $this->step = $step;
        return $this;
    }
}