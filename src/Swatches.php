<?php

namespace Yna\NovaSwatches;

use Laravel\Nova\Fields\Field;

class Swatches extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-swatches';

    /**
     * The text alignment for the field's text in tables.
     *
     * @var string
     */
    public $textAlign = 'center';

    /**
     * The field's props.
     * 
     * @var array
     */
    protected $props = [];

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $props = config('nova.swatches.props');

        if (!empty($props)) {
            $this->withProps($props);
        }
    }

    /**
     * @return $this 
     */
    public function hideLabelFromForms()
    {
        return $this->withMeta(['hideLabelFromForms' => true]);
    }

    /**
     * @param string|array $colors 
     * @return $this
     */
    public function colors($colors)
    {
        return $this->withProps(['colors' => $colors]);
    }

    /**
     * @param string $direction
     * @return $this
     */
    public function popoverTo($direction)
    {
        return $this->withProps(['popoverTo' => $direction]);
    }

    /**
     * @param string $length
     * @return $this
     */
    public function rowLength($length)
    {
        return $this->withProps(['rowLength' => $length]);
    }

    /**
     * @param string|boolean $inputType - "text" | "color" | false
     * @return $this 
     */
    public function showFallback($inputType = 'text')
    {
        if (!$inputType) {
            return $this->withProp('showFallback', false);
        }

        return $this->withProps([
            'showFallback' => true,
            'fallbackInputType' => $inputType,
        ]);
    }

    /**
     * Pass a prop directly to vue-swatches.
     * 
     * See https://saintplay.github.io/vue-swatches/#sub-props
     * 
     * @param string $name 
     * @param mixed $value 
     * @return $this 
     */
    public function withProp($name, $value)
    {
        return $this->withProps([$name => $value]);
    }

    /**
     * Pass an array of props directly to vue-swatches.
     * 
     * See https://saintplay.github.io/vue-swatches/#sub-props
     * 
     * @param array $array
     * @return $this 
     */
    public function withProps($array)
    {
        $this->props = array_merge($this->props, $array);

        return $this->withMeta(['props' => $this->props]);
    }

    public function withDefault($color)
    {
        return $this->withMeta(['value' => $color]);
    }
}
