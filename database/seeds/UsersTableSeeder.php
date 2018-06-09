<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create('zh_TW');

        // Let's make sure everyone has the same password and
        // let's hash it before the loop, or else our seeder
        // will be too slow.
        $password = Hash::make('password');

        User::create([
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'remember_token' => 'admin',
            'role_id' => 1,
        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'username' => $faker->username,
                'email' => $faker->email,
                'password' => $password,
                'remember_token' => 'admin',
                'role_id' => $i + 1,
            ]);
        }
    }
}
