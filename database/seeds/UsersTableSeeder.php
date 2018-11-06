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
        factory(App\User::class, 50)->create()->each(function ($user) {
           $user->profile()->save(factory(App\Profile::class)->make());
           // $profile = factory(\App\Profile::class)->make();
           // $profile->user()->associate($user);
        });
    }
}
