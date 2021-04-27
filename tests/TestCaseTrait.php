<?php

namespace Nhrrob\Robinpress\Tests;

//For unknow reason I couldnt use my own TestCaseRobin class extending TestCase from testbench; So created trait
trait TestCaseTrait
{
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
   
}
