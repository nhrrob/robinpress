<?php
namespace Nhrrob\Robinpress\Fields;

use Nhrrob\Robinpress\MarkdownParser;

class Body extends FieldContract{
    
    public static function process($fieldType, $fieldValue, $data){
        return [
           $fieldType => MarkdownParser::parse($fieldValue),
        ];
    }
}
