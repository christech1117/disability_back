<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class); // 人員資料
        $this->call(RoleTableSeeder::class); // 人員角色權限表
        $this->call(CompanyBasicTableSeeder::class); // 組織基本資料
        $this->call(CompanyDepartmentTableSeeder::class); // 單位管理
        $this->call(CompanyDapartmentTypeTableSeeder::class); // 單位管理類型表
        $this->call(CompanyPlanTableSeeder::class); // 方案管理
        // $this->call(PersonServiceUserSeeder::class); // 服務人員管理
        $this->call(PersonObstacleTypeSeeder::class); // 障礙種類表
    }
}
