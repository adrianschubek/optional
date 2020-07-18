<?php
/**
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */

namespace adrianschubek\Support;


use adrianschubek\Macro\HasMacros;
use adrianschubek\Macro\Macroable;
use ArrayAccess;

class Optional implements Macroable, ArrayAccess
{
    use HasMacros {
        __call as macroCall;
    }

    protected $obj;

    public function __construct($obj)
    {
        $this->obj = $obj;
    }

    public function __get($name)
    {
        if (is_object($this->obj)) {
            return $this->obj->{$name} ?? null;
        }

        return null;
    }

    public function __call($name, $arguments)
    {
        $this->obj->{$name}(...$arguments);

        return $this->obj;
    }

    public function offsetExists($offset)
    {
        return $this->__isset($offset);
    }

    public function __isset($name)
    {
        if (is_object($this->obj)) {
            return isset($this->obj->{$name});
        }

        if (is_array($this->obj)) {
            return isset($this->obj[$name]);
        }

        return false;
    }

    public function offsetGet($offset)
    {
        if (is_object($this->obj)) {
            return $this->obj->{$offset};
        }
        if (is_array($this->obj)) {
            return $this->obj[$offset];
        }

        return null;
    }

    public function offsetSet($offset, $value)
    {
        if (is_array($this->obj)) {
            $this->obj[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->obj[$offset]);
    }
}