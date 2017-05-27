<?php

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          for ($i=0; $i < 100 ; $i++) {
              $spot = App\Spot::inRandomOrder()->firstOrFail();

              $count = App\Feature::where('spot_id', $spot->id)->count();

              factory(App\Feature::class)->create(['spot_id' => $spot->id, 'index' => $count]);
          }
    }
}
