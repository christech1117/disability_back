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
            'company_id' => '1',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'avatar' => 'https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif',
            'work_start_date' => $faker->date,
            'phone' => $faker->phoneNumber,
            'address' => $faker->address,
            'depart_id' => rand(1, 10),
            'work_title' => $faker->jobTitle,
            'plan_id' => rand(1, 10),
            'team_id' => rand(1, 10),
            'role_id' => 1,
            'active' => rand(true, false),
            'remember_token' => 'admin',
        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 50; $i++) {
            User::create([
                'company_id' => rand(1, 10),
                'username' => $faker->unique()->name,
                'email' => $faker->email,
                'password' => $password,
                'avatar' => 'https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif',
                'work_start_date' => $faker->date,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'depart_id' => rand(1, 10),
                'work_title' => $faker->jobTitle,
                'plan_id' => rand(1, 10),
                'team_id' => rand(1, 10),
                'role_id' => $i + 1,
                'active' => rand(true, false),
                'remember_token' => 'admin',
            ]);
        }
    }
}
