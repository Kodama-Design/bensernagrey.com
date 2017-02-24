<?php
namespace Sapling\ACF\Fields\Traits;


trait ChoicesTrait
{
    /** @var array Array of choices where the key is used as value and the value is used as label */
    protected $choices = [];

    /**
     * @return array Array of choices where the key is used as value and the value is used as label
     */
    public function getChoices(): array
    {
        return $this->choices;
    }

    /**
     * @param array $choices Array of choices where the key is used as value and the value is used as label
     * @return $this
     */
    public function setChoices(array $choices)
    {
        $this->choices = $choices;
        return $this;
    }
}