<?php

namespace Nhrrob\Robinpress\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Nhrrob\Robinpress\Post;
use Orchestra\Testbench\TestCase;
use PostFactory;

class SavePostsTest extends TestCase
{

    use TestCaseTrait, RefreshDatabase;


    //https://laracasts.com/discuss/channels/laravel/error-in-unit-test-when-using-setup-function
    protected function setup(): void
    {
        parent::setUp();
        // $this->withFactories(__DIR__.'/../database/factories');
    }

    // //As i couldnt use TestCaseRobin class : for unknown reason
    protected function getPackageProviders($app)
    {
        return [
            \Nhrrob\Robinpress\PressBaseServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testdb');
        $app['config']->set('database.connections.testdb', [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);
    }

    /** @test */
    public function a_post_can_be_created_with_the_factory()
    {
        $posts = Post::factory()->count(3)->create();
        $this->assertCount(3, Post::all());
    }
}
