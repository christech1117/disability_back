<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('plan_id')->comment('組織方案管理，服務人數用病患人數動態計算');
            $table->integer('company_id')->comment('所屬組織');
            $table->integer('user_id')->nullable()->comment('計畫承辦人');
            $table->string('plan_name')->comment('方案名稱');
            $table->string('area_name')->comment('服務據點名稱');
            $table->string('area_description')->comment('服務據點說明');
            $table->date('service_start_date')->comment('服務開辦日期');
            $table->date('service_end_date')->nullable()->comment('服務結束日期');
            $table->string('price')->default(0)->comment('收費');
            $table->string('description')->nullable()->comment('說明');
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
        Schema::dropIfExists('company_plans');
    }
}
