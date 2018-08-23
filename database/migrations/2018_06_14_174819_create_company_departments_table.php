<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_departments', function (Blueprint $table) {
            # 日間服務
            $table->increments('depart_id')->comment('部門/單位，上面還有子公司');
            $table->integer('company_id')->nullable()->comment('公司編號');
            $table->integer('sub_company_id')->nullable()->comment('子公司編號');
            $table->enum('depart_type', ['day', 'live', 'job'])->comment('單位種類');
            $table->string('service_type')->nullable()->default('')->comment('服務類型');
            $table->string('depart_name')->comment('單位名稱');
            $table->integer('plan_id')->nullable()->comment('方案');
            $table->integer('user_id')->nullable()->comment('主責人');
            $table->string('address')->nullable()->comment('住址');
            $table->string('phone')->nullable()->comment('電話');
            # 居住服務
            $table->enum('house_type', ['single', 'apartment', 'building', 'other'])->nullable()->comment('房舍類型：分別為透天、公寓、大廈、其他');
            $table->boolean('have_elevator')->nullable()->default(false)->comment('有無電梯');
            $table->enum('house_nature', ['self', 'rent', 'depart', 'financial', 'society', 'other'])->nullable()->comment('房舍性質');
            $table->string('rent')->nullable()->comment('每月租金');
            $table->string('floor')->nullable()->comment('樓層');
            $table->string('floor_area')->nullable()->comment('樓地板面積');
            $table->string('parlor_count')->nullable()->comment('客廳數');
            $table->string('bathroom_count')->nullable()->comment('衛浴數');
            $table->string('room_count')->nullable()->comment('房間數');
            $table->string('bed_count')->nullable()->comment('床位數');
            # 就業服務
            $table->string('work_start_time')->nullable()->comment('工作時間');
            $table->string('work_end_time')->nullable()->comment('工作時間');
            $table->enum('salary', ['item', 'hour', 'month', 'other'])->nullable()->comment('工資');
            $table->string('content')->nullable()->default('')->comment('工作內容');

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
        Schema::dropIfExists('company_departments');
    }
}
