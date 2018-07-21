<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanySubCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_sub_companies', function (Blueprint $table) {
            $table->increments('id')->comment('子公司編號');
            $table->integer('company_id')->nullable()->comment('公司編號');
            $table->string('service_type')->comment('服務類型');
            $table->string('depart_name')->comment('單位名稱');
            $table->integer('plan_id')->comment('方案');
            $table->integer('user_id')->nullable()->comment('主責人');
            $table->string('address')->nullable()->comment('住址');
            $table->string('tel')->nullable()->comment('電話');
            $table->integer('live_id')->nullable()->comment('日間編號，沒有則為null');
            $table->integer('job_id')->nullable()->comment('就業編號，沒有則為null');
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
        Schema::dropIfExists('company_sub_companies');
    }
}
