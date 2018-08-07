<?php

use Illuminate\Database\Seeder;
use App\PersonServiceUser;

class PersonServiceUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonServiceUser::truncate();

        $faker = \Faker\Factory::create('zh_TW');
        $sex = ['male', 'female'];
        $marriage = ['unmarried','married','other'];
        $blood = ['A', 'B', 'AB', 'O'];
        $obstacle_level = ['low', 'medium', 'severe', 'vary_severe'];

        for ($i = 0; $i < 50; $i++) {
            PersonServiceUser::create([
                'company_id' => rand(1, 5),
                'name' => $faker->name,
                'birthday' => '2018-06-06',
                'sex' => $sex[array_rand($sex)],
                'identity' => $faker->unique()->personalIdentityNumber,
                'publish_date' => $faker->date,
                'identify_date' => $faker->date,
                'avatar' => 'https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif',
                'obstacle_level' => $obstacle_level[array_rand($obstacle_level)],
                'marriage' => $marriage[array_rand($marriage)],
                'marriage_memo' => rand(1, 10),
                'house_address' => $faker->address,
                'contact_address' => $faker->address,
                'family_img' => '',
                'height' => rand(130, 180),
                'weight' => rand(30, 80),
                'blood' => $blood[array_rand($blood)],
                'care_people' => $faker->name,
                'decided_people' => $faker->name,
                'education' => rand(1, 10),
            ]);
        }
    }
}
