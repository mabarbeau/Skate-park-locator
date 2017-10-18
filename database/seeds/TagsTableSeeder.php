<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 300 ; $i++) {
            $spot = App\Spot::inRandomOrder()->firstOrFail();

            $count = App\Tag::where('spot_id', $spot->id)->count();

            factory(App\Tag::class)->create([
                'spot_id' => $spot->id,
                'index' => $count,
             ]);
        }
    }
}
