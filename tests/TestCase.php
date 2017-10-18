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
    * Make three new rows for the tags table
    *
    * @return array  $test
    **/
    public function tagFactoryProvider()
    {
        $tags = factory(\App\Tag::class, 3)->make();

        foreach ($tags as $tag)
        {
            $test["\n\n key: $tag->key \n value: $tag->value \n\n"] = [$tag];
        }

        return $test;
    }

    /**
    * Provide three random rows from the tags table
    *
    * @return array  $test
    **/
    public function tagProvider()
    {
        $tags = \App\Tag::take(3)->inRandomOrder()->get();

        foreach ($tags as $tag)
        {
            $test["\n\n spot_id: $tag->spot_id \n index: $tag->index \n key: $tag->key \n value: $tag->value \n\n"] = [$tag];
        }

        return $test;
    }

}
