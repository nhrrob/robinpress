<?php

namespace Nhrrob\Robinpress\Tests;

use Nhrrob\Robinpress\MarkdownParser;
use Orchestra\Testbench\TestCase;

class MarkdownTest extends TestCase
{
    use TestCaseTrait;
    /** @test */
    public function simple_markdown_is_parsed()
    {
        $this->assertEquals('<h1>Wow</h1>', MarkdownParser::parse('#Wow'));
    }
}
