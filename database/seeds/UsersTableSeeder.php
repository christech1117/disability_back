<?php

use App\User;
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
        User::truncate();

        $faker = \Faker\Factory::create('zh_TW');

        // Let's make sure everyone has the same password and
        // let's hash it before the loop, or else our seeder
        // will be too slow.
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
            'family',
        ];
        $username = [
            '系統管理員',
            '組織管理員',
            '組織主管',
            '部門主管',
            '組\科\室主管',
            'ISP 促進者',
            '執行監督者',
            '支持者',
            'OEES 訪員',
            'SIS 訪員',
            'POS 訪員',
            '服務對象\家屬',
        ];
        // $username = [
        //     'super_admin',
        //     'admin',
        //     'company_leader',
        //     'department_leader',
        //     'group_leader',
        //     'isp',
        //     'supervisor',
        //     'supporter',
        //     'oees',
        //     'sis',
        //     'pos',
        //     'family'
        // ];

        for ($i = 0; $i < 12; $i++) {
            User::create([
                'company_id' => '2',
                'username' => $username[$i],
                'email' => $role[$i] . '@test.com',
                'password' => Hash::make($role[$i]),
                'avatar' => 'https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif',
                'work_start_date' => $faker->date,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'depart_id' => rand(1, 5),
                'work_title' => $faker->jobTitle,
                'plan_id' => rand(1, 5),
                'team_id' => rand(1, 5),
                'role_id' => $i + 1,
                'approve_status' => 'sis',
                'income' => $income[array_rand($income)],
                'active' => rand(true, false),
                'token' => 'admin',
            ]);
        }
    }
}
