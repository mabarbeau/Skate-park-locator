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
        for ($i=0; $i < 300 ; $i++) {
            $users = App\User::select('id')->inRandomOrder()->take(2)->get();
            $spot = App\Spot::inRandomOrder()->firstOrFail();

            $count = App\Feature::where('spot_id', $spot->id)->count();

            factory(App\Feature::class)->create([
                'creator_id'=> $users[0]->id,
                'updater_id'=> $users[1]->id,
                'spot_id' => $spot->id,
                'index' => $count,
             ]);
        }
    }
}
