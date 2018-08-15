<?php

use Illuminate\Database\Seeder;
use App\CompanySubCompany;

class CompanySubCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanySubCompany::truncate();

        $faker = \Faker\Factory::create('zh_TW');

        for ($i = 0; $i < 5; $i++) {
            CompanySubCompany::create([
                'company_id' => rand(1, 2),
                'sub_company_name' => $faker->unique()->company,
                'sub_company_description' => $faker->word
            ]);
        }
    }
}
