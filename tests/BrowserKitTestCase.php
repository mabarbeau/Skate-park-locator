<?php

use Illuminate\Contracts\Console\Kernel;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

use App\Spot;

abstract class BrowserKitTestCase extends BaseTestCase
{
    /**
    * Create create application early for data provider
    **/
    public function __construct($name = null, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->createApplication();
    }

    /**
     * The base URL of the application.
     *
     * @var string
     */
    public $baseUrl = 'http://localhost';

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
    * Provide test with random slugs from spots table
    *
    * @return $slug
    **/
    public function slugProvider()
    {
        $spots = Spot::select('slug')->inRandomOrder()->take(3)->get();

        foreach ($spots as $spot)
        {
            $test["Testing '$spot->slug'"] = [$spot->slug];
        }

        return $test;
    }

}
