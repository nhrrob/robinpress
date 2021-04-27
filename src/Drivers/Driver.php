<?php

namespace Nhrrob\Robinpress\Drivers;

use Nhrrob\Robinpress\PressFileParser;
use \Str;

abstract class Driver
{

    protected $config;

    protected $posts = [];

    public function __construct()
    {
        $this->setConfig();

        $this->validateSource();

        //
    }

    protected function setConfig()
    {
        $this->config = config('robinpress.' . config('robinpress.driver')); //robinpress.file
    }

    protected function validateSource()
    {
        return true;
    }

    public abstract function fetchPosts();
    
    protected function parse($content, $identifier)
    {
        $this->posts[] = 
        array_merge(
            (new PressFileParser($content))->getData(),
            ['identifier' => Str::slug($identifier)]
        )
        ;
    }
}
