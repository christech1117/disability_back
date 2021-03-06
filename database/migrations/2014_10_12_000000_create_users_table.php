<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('員工基本資料');
            $table->integer('company_id')->comment('所屬公司');
            $table->integer('sub_company_id')->comment('所屬子公司');
            $table->string('username')->unique()->comment('員工名稱');
            $table->string('email')->unique()->comment('信箱');
            $table->string('password')->comment('密碼');
            $table->string('avatar')->nullable()->comment('照片');
            $table->date('work_start_date')->nullable()->comment('就職日期');
            $table->string('phone')->nullable()->comment('電話');
            $table->string('address')->nullable()->comment('聯絡住址');
            $table->integer('depart_id')->nullable()->comment('部門或單位');
            $table->string('work_title')->nullable()->comment('職稱');
            $table->integer('plan_id')->nullable()->comment('方案計畫名稱');
            $table->string('team_id')->nullable()->comment('所屬團隊(可能會有複數團隊)');
            $table->integer('role_name')->nullable()->comment('角色');
            $table->integer('role_id')->comment('角色權限');
            $table->string('approve_status')->default('')->comment('審核');
            $table->enum('income', ['no', 'look', 'edit'])->nullable()->comment('個人收入');
            $table->boolean('active')->default(true)->comment('工作狀態：就業or離職');
            $table->longText('token')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
