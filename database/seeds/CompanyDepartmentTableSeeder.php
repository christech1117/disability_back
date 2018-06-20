<?php

use Illuminate\Database\Seeder;
use App\CompanyDepartment;

class CompanyDepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyDepartment::truncate();

        $faker = \Faker\Factory::create('zh_TW');

        $depart_type = ['day', 'live', 'job'];

        for ($i = 0; $i < 50; $i++) {
            CompanyDepartment::create([
                'depart_type' => $depart_type[array_rand($depart_type)],
                'service_type' => rand(1, 5),
                'depart_name' => $faker->jobTitle,
                'plan_id' => $i + 1,
                'user_id' => $i + 1,
                'address' => $faker->address,
                'tel' => $faker->phoneNumber,
                'live_id' => $i + 1,
                'job_id' => $i + 1
            ]);
        }
    }
}
