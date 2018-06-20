<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->increments('id')->comment('單位管理-就業服務');
            $table->string('work_time')->nullable()->comment('工作時間');
            $table->string('work_hour')->nullable()->comment('工作時數');
            $table->enum('salary', ['item', 'hour', 'month', 'other'])->nullable()->comment('工資');
            $table->enum('content', [''])->nullable()->comment('工作內容');
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
        Schema::dropIfExists('company_jobs');
    }
}
