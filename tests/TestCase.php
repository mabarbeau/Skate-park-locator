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
    * Create three new rows for the spots table
    *
    * @return array  $test
    **/
    public function spotFactoryProvider()
    {
        $spots = factory(\App\Spot::class, 3)->make();

        foreach ($spots as $spot)
        {
            $test["\n\n Title: $spot->title \n Slug: $spot->slug \n\n"] = [$spot];
        }

        return $test;
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

    /**
    * Make three new rows for the features table
    *
    * @return array  $test
    **/
    public function featureFactoryProvider()
    {
        $features = factory(\App\Feature::class, 3)->make();

        foreach ($features as $feature)
        {
            $test["\n\n name: $feature->name \n description: $feature->description \n\n"] = [$feature];
        }

        return $test;
    }

    /**
    * Provide three random rows from the features table
    *
    * @return array  $test
    **/
    public function featureProvider()
    {
        $features = \App\Feature::take(3)->inRandomOrder()->get();

        foreach ($features as $feature)
        {
            $test["\n\n spot_id: $feature->spot_id \n index: $feature->index \n name: $feature->name \n description: $feature->description \n\n"] = [$feature];
        }

        return $test;
    }

}
