<?php

namespace Nhrrob\Robinpress;

use Str;

class Robinpress
{

    protected $fields = [];

    public function configNotPublished()
    {
        return is_null(config('robinpress'));
    }

    public function driver()
    {
        $driver = Str::title(config('robinpress.driver')); //file => File

        $class = 'Nhrrob\Robinpress\Drivers\\' . $driver . 'Driver';

        return new $class;
    }

    public function path()
    {
        return config('robinpress.path', 'blogs');
    }

    public function fields(array $fields)
    {
        $this->fields = array_merge($this->fields, $fields);
    }

    public function availableFields()
    {
        return array_reverse($this->fields);
    }
}
