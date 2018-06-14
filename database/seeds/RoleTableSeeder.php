<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = array(
            array('title' => 'super_admin', 'description' => '系統管理員'),
            array('title' => 'admin', 'description' => '組織管理員'),
            array('title' => 'company_leader', 'description' => '組織主管'),
            array('title' => 'department_leader', 'description' => '部門主管'),
            array('title' => 'group_leader', 'description' => '組\科\室主管'),
            array('title' => 'isp', 'description' => 'ISP 促進者'),
            array('title' => 'supervisor', 'description' => '執行監督者'),
            array('title' => 'supporter', 'description' => '支持者'),
            array('title' => 'oees', 'description' => 'OEES 訪員'),
            array('title' => 'sis', 'description' => 'SIS 訪員'),
            array('title' => 'pos', 'description' => 'POS 訪員'),
            array('title' => 'family', 'description' => '服務對象\家屬'),
        );

        foreach ($items as $key => $item) {
            Role::create([
                'title' => $item['title'],
                'description' => $item['description'],
            ]);
        }
    }
}
