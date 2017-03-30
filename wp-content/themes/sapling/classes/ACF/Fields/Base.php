<?php
namespace Sapling\ACF\Fields;


abstract class Base
{
    protected $key;
    protected $label;
    protected $name;
    protected $type;
    protected $instructions = '';
    protected $required = 0;
    protected $conditional = 0;
    protected $wrapper = ['width'=>'', 'class'=>'', 'id'=>''];
    protected $default = '';
    protected $readOnly = 0;
    protected $disabled = 0;

    abstract public function getType();

    public function __construct($key, $label, $name)
    {
        $this->setKey($key);
        $this->setLabel($label);
        $this->setName($name);
    }

    function build()
    {
        return [
            'key' => $this->getKey(),
            'label' => $this->getLabel(),
            'name' => $this->getName(),
            'type' => $this->getType(),
            'instructions' => $this->getInstructions(),
            'required' => $this->getRequired(),
            'conditional_logic' => $this->conditional,
            'wrapper' => $this->getWrapper(),
            'default_value' => $this->getDefault(),
            'readonly' => $this->getReadOnly(),
            'disabled' => $this->getDisabled(),
        ];
    }

    public function register($parent)
    {
        $settings = array_merge($this->build(), ['parent' => $parent]);
        return acf_add_local_field($settings);
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getInstructions()
    {
        return $this->instructions;
    }

    public function setInstructions($instructions)
    {
        $this->instructions = $instructions;
        return $this;
    }

    public function getRequired()
    {
        return $this->required;
    }

    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    public function getConditional()
    {
        return $this->conditional;
    }

    public function setConditional($conditional)
    {
        $this->conditional = $conditional;
        return $this;
    }

    public function getWrapper()
    {
        return $this->wrapper;
    }

    public function setWrapper(array $wrapper)
    {
        $this->wrapper = $wrapper;
        return $this;
    }

    public function getDefault()
    {
        return $this->default;
    }

    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }

    public function getReadOnly()
    {
        return $this->readOnly;
    }

    public function setReadOnly($read_only)
    {
        $this->readOnly = $read_only;
        return $this;
    }

    public function getDisabled()
    {
        return $this->disabled;
    }

    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }
}