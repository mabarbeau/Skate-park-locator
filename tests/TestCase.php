<?php
namespace Tests;

use \Illuminate\Contracts\Console\Kernel;
use \Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
    * Provide three random rows from the spots table
    *
    * @return array  $test
    **/
    public function spotProvider()
    {
        $spots = \App\Spot::select('slug', 'title')->inRandomOrder()->take(3)->get();

        foreach ($spots as $spot)
        {
            $test["\n\n Title: $spot->title \n Slug: $spot->slug \n\n"] = [$spot];
        }

        return $test;
    }

}
