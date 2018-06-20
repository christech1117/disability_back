<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyLivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_lives', function (Blueprint $table) {
            $table->increments('id')->comment('單位管理-居住服務');
            $table->enum('house_type', ['single', 'apartment', 'building', 'other'])->nullable()->comment('房舍類型：分別為透天、公寓、大廈、其他');
            $table->boolean('have_elevator')->nullable()->comment('有無電梯');
            $table->enum('house_nature', ['self', 'rent', 'depart', 'financial', 'society', 'other'])->comment('房舍性質');
            $table->string('rent')->default(0)->comment('每月租金');
            $table->string('floor')->nullable()->comment('樓層');
            $table->string('floor_area')->default(0)->comment('樓地板面積');
            $table->string('parlor_count')->default(0)->comment('客廳數');
            $table->string('bathroom_count')->default(0)->comment('衛浴數');
            $table->string('room_count')->default(0)->comment('房間數');
            $table->string('bed_count')->default(0)->comment('床位數');
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
        Schema::dropIfExists('company_lives');
    }
}
