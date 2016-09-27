<?php

use Illuminate\Database\Seeder;

class SpotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Spot::class, 50)->create()->each(function($s) {
        $s->features()->save(factory(App\Feature::class)->make());
      });
    }
}
