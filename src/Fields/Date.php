<?php
namespace Nhrrob\Robinpress\Fields;

use Carbon\Carbon;

class Date extends FieldContract{
    
    public static function process($fieldType, $fieldValue, $data){
        return [
           $fieldType => Carbon::parse($fieldValue),
           'parsed_at' => Carbon::now(),
           'foo' => 'bar',
        ];
    }
}
