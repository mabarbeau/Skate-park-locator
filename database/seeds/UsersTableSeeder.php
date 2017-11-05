<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create()->each(function ($user) {
            $user->roles()->attach(App\Role::inRandomOrder()->first());
            $user->token()->save(factory(App\LoginToken::class)->make(['user_id' => $user->id]));
        });
    }
}
