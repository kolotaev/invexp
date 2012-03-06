<?php

class BeanFactory
{
    public static function build($type)
    {
        $class = $type . 'Bean';
        if (!class_exists($class)) {
            throw new Exception('Missing format class.');
        }
        return new $class;
    }
}