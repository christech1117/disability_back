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
        $income = ['no', 'look', 'edit'];
        $role = [
            'super_admin',
            'admin',
            'company_leader',
            'department_leader',
            'group_leader',
            'isp',
            'supervisor',
            'supporter',
            'oees',
            'sis',
            'pos',
            'family'
        ];

        for ($i = 0; $i < 12; $i++) {
            User::create([
                'company_id' => '1',
                'username' => $role[$i],
                'email' => $role[$i],
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
                'approve_status' => 'sis',
                'income' => $income[array_rand($income)],
                'active' => rand(true, false),
                'remember_token' => 'admin',
            ]);
        }
    }
}
