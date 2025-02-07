<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SpotsTableSeeder::class);
        $this->call(TagsTableSeeder::class);

    }
}
