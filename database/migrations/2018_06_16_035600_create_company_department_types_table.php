<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDepartmentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_department_types', function (Blueprint $table) {
            $table->increments('id')->comment('單位管理-日間服務');
            $table->enum('type', ['day', 'live', 'job'])->comment('單位種類');
            $table->string('title')->comment('日間服務名稱');
            $table->string('description')->comment('日間服務說明');
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
        Schema::dropIfExists('company_department_types');
    }
}
