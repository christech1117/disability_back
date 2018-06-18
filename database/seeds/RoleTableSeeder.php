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
        $items = [
            ['title' => 'super_admin', 'description' => '系統管理員'],
            ['title' => 'admin', 'description' => '組織管理員'],
            ['title' => 'company_leader', 'description' => '組織主管'],
            ['title' => 'department_leader', 'description' => '部門主管'],
            ['title' => 'group_leader', 'description' => '組\科\室主管'],
            ['title' => 'isp', 'description' => 'ISP 促進者'],
            ['title' => 'supervisor', 'description' => '執行監督者'],
            ['title' => 'supporter', 'description' => '支持者'],
            ['title' => 'oees', 'description' => 'OEES 訪員'],
            ['title' => 'sis', 'description' => 'SIS 訪員'],
            ['title' => 'pos', 'description' => 'POS 訪員'],
            ['title' => 'family', 'description' => '服務對象\家屬'],
        ];

        foreach ($items as $key => $item) {
            Role::create([
                'title' => $item['title'],
                'description' => $item['description'],
            ]);
        }
    }
}
