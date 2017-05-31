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
        $users = App\User::select('id')->inRandomOrder()->get();

        for ($i=0; $i < 100 ; $i++) {
            factory(App\Spot::class)->create([
                'creator_id'=> $users[$i]->id,
                'updater_id'=> $users[$i]->id,
            ]);
        }
    }
}
