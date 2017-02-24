<?php
namespace Sapling\ACF\Fields\Traits;


trait LayoutTrait
{
    /** @var string Specify the layout of the inputs. Choices of 'vertical' or 'horizontal' */
    protected $layout = '';

    /**
     * @return string Specify the layout of the inputs.
     */
    public function getLayout(): string
    {
        return $this->layout;
    }

    /**
     * @param string $layout Specify the layout of the inputs. Choices of 'vertical' or 'horizontal'
     * @return $this
     */
    public function setLayout(string $layout)
    {
        $this->layout = $layout;
        return $this;
    }
}