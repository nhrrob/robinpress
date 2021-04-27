<?php

namespace Nhrrob\Robinpress\Fields;

abstract class FieldContract
{

    public static function process($fieldType, $fieldValue, $data)
    {
        return [$fieldType => $fieldValue];
    }
}
