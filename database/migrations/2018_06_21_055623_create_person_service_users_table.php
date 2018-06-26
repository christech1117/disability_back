<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonServiceUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_service_users', function (Blueprint $table) {
            $table->increments('id')->comment('服務人員管理');
            $table->integer('company_id')->comment('所屬公司編號');
            $table->string('name')->comment('姓名');
            $table->string('birthday')->comment('出生日期');
            $table->enum('sex',['male', 'female'])->comment('性別');
            $table->string('identity')->unique()->comment('身分證字號');
            $table->date('publish_date')->nullable()->comment('手冊核發日期');
            $table->date('identify_date')->nullable()->comment('後續鑑定日期');
            $table->string('avatar')->nullable()->comment('照片');
            $table->enum('obstacle_level', ['low', 'medium', 'severe', 'vary_severe'])->comment('障礙等級');
            $table->enum('marriage', ['unmarried', 'married', 'other'])->comment('婚姻狀況');
            $table->integer('marriage_memo')->nullable()->comment('婚姻狀況(子/女幾人)');
            $table->string('house_address')->comment('戶籍地址');
            $table->string('contact_address')->comment('通訊地址');
            $table->string('family_img')->nullable()->comment('家系圖暨生態圖');
            $table->string('height')->nullable()->comment('身高');
            $table->string('weight')->nullable()->comment('體重');
            $table->string('blood')->nullable()->comment('血型');
            $table->string('care_people')->nullable()->comment('主要照顧者');
            $table->string('decided_people')->nullable()->comment('主要決策者');
            $table->string('education')->nullable()->comment('教育程度');
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
        Schema::dropIfExists('person_service_users');
    }
}
