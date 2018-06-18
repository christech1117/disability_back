<?php

use Illuminate\Database\Seeder;
use App\CompanyDepartmentType;

class CompanyDapartmentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['type' => 'day', 'title' => 'day_care', 'description' => '日間照顧'],
            ['type' => 'day', 'title' => 'day_active', 'description' => '日間活動(含休閒、工作)'],
            ['type' => 'day', 'title' => 'community', 'description' => '社區日間作業設施'],
            ['type' => 'day', 'title' => 'group_work', 'description' => '小組工作安置'],
            ['type' => 'day', 'title' => 'other', 'description' => '其他'],

            ['type' => 'live', 'title' => 'large', 'description' => '大型機構(>200人)'],
            ['type' => 'live', 'title' => 'small', 'description' => '小型機構(30人~200人)'],
            ['type' => 'live', 'title' => 'night', 'description' => '夜間型住宿機構(<29人)'],
            ['type' => 'live', 'title' => 'community', 'description' => '社區居住(<6人)'],
            ['type' => 'live', 'title' => 'family', 'description' => '與家人同住'],
            ['type' => 'live', 'title' => 'outside', 'description' => '自己在外面居住'],
            ['type' => 'live', 'title' => 'other', 'description' => '其他'],

            ['type' => 'job', 'title' => 'sheltered', 'description' => '庇護性就業'],
            ['type' => 'job', 'title' => 'supportive', 'description' => '支持性就業'],
            ['type' => 'job', 'title' => 'general', 'description' => '一般性就業'],
            ['type' => 'job', 'title' => 'other', 'description' => '其他'],
        ];

        foreach ($items as $key => $item) {
            CompanyDepartmentType::create([
                'type' => $item['type'],
                'title' => $item['title'],
                'description' => $item['description'],
            ]);
        }
    }
}
