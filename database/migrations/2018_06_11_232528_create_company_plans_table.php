<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_plans', function (Blueprint $table) {
            $table->increments('plan_id')->comment('組織方案管理，服務時間理想上是現在時間減開始時間，若結束時間not null則用結束時間減開始時間，服務人數用病患人數動態計算');
            $table->integer('company_id')->comment('所屬組織');
            $table->integer('user_id')->nullable()->comment('計畫承辦人');
            $table->string('plan_name')->comment('方案名稱');
            $table->string('area_name')->comment('服務據點名稱');
            $table->date('service_start_date')->comment('服務開辦日期');
            $table->date('service_end_date')->nullable()->comment('服務結束日期');
            $table->string('price')->default(0)->comment('收費');
            $table->string('description')->nullable()->comment('說明');
            $table->string('is_del')->default(false)->comment('是否刪除');
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
        Schema::dropIfExists('company_plans');
    }
}
