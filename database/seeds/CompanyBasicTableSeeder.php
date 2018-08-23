<?php

use App\CompanyBasic;
use Illuminate\Database\Seeder;

class CompanyBasicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        CompanyBasic::truncate();

        $faker = \Faker\Factory::create('zh_TW');
        $service_area = ['city', 'suburb', 'complex'];
        $service_people = ['obstacles', 'old', 'spirit', 'Special'];

        for ($i = 0; $i < 10; $i++) {
            CompanyBasic::create([
                'company_name' => $faker->unique()->company,
                'user_id' => $i + 1,
                'tel' => $faker->phoneNumber,
                'email' => $faker->email,
                'service_area' => $service_area[array_rand($service_area)],
                'service_people' => $service_people[array_rand($service_people)],
                'budget' => $faker->randomNumber,
            ]);
        }
    }
}
