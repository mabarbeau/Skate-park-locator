<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

use App\Spot;
use App\Tag;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function __construct($name = null, array $data = array(), $dataName = '') {
        
        parent::__construct($name, $data, $dataName);

        $this->createApplication();
    }


    /**
    * Create three new rows for the spots table
    *
    * @return array  $test
    **/
    public function spotFactoryProvider()
    {
        $spots = factory(Spot::class, 3)->make();

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
        $spots = Spot::select('slug', 'title')->inRandomOrder()->take(3)->get();

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
        $tags = factory(Tag::class, 3)->make();

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
        $tags = Tag::take(3)->inRandomOrder()->get();

        foreach ($tags as $tag)
        {
            $test["\n\n spot_id: $tag->spot_id \n index: $tag->index \n key: $tag->key \n value: $tag->value \n\n"] = [$tag];
        }

        return $test;
    }

}
