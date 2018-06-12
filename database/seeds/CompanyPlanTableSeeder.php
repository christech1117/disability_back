<?php

use Illuminate\Database\Seeder;
use App\CompanyPlan;

class CompanyPlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyPlan::truncate();

        $faker = \Faker\Factory::create('zh_TW');

        for ($i = 0; $i < 50; $i++) {
            CompanyPlan::create([
                'company_id' => rand(1, 10),
                'plan_name' => $faker->unique()->jobTitle,
                'area_name' => $faker->city,
                'user_id' => $i + 1,
                'tel' => $faker->phoneNumber,
                'email' => $faker->email,
                'service_start_date' => $faker->dateTime,
                'service_end_date' => $faker->dateTime,
                'price' => $faker->randomNumber,
                'description' => $faker->word,
            ]);
        }
    }
}
