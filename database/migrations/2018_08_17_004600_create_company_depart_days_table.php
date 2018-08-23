<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDepartDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_depart_days', function (Blueprint $table) {
            $table->increments('id')->comment('部門/單位-日間服務');
            $table->integer('company_id')->comment('公司編號');
            $table->integer('sub_company_id')->comment('子公司編號');
            $table->string('service_type')->default('')->comment('服務類型');
            $table->string('depart_name')->comment('單位名稱');
            $table->integer('plan_id')->comment('方案');
            $table->integer('user_id')->nullable()->comment('主責人');
            $table->string('address')->nullable()->comment('住址');
            $table->string('phone')->nullable()->comment('電話');
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
        Schema::dropIfExists('company_depart_days');
    }
}
