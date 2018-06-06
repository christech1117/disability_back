<?php

use Illuminate\Database\Seeder;
use App\CompanyBasic;

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
        $service_area = array("city", "suburb", "complex");
        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            CompanyBasic::create([
                'company_name' => $faker->unique()->company,
                'user_id' => $i + 1,
                'tel' => $faker->phoneNumber,
                'email' => $faker->email,
                'service_area' => $service_area[array_rand($service_area)],
                'service_people' => $faker->mimeType,
                'budget' => $faker->randomNumber,
                'service_content' => $faker->sentence
            ]);
        }
    }
}
