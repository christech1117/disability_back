<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_basics', function (Blueprint $table) {
            $table->increments('company_id')->comment('組織基本資料，組織服務內容為一對多，所以另開一個table，服務對象年齡層百分比為個人層級之病人年齡動態顯示，服務人數為個人層級之病人數目動態顯示，服務人數為人員管理之數目動態顯示');
            $table->string('company_name')->unique()->comment('組織\單位名稱');
            $table->string('member_id')->unique()->comment('聯絡人姓名');
            $table->string('tel')->unique()->comment('電話');
            $table->string('email')->unique()->comment('Email');
            $table->string('service_area')->comment('服務地區類別');
            $table->string('service_people')->comment('服務對象類別');
            $table->string('budget')->comment('年度預算');
            $table->string('service_content')->comment('組織服務內容');
            $table->enum('is_del', ['0','1'])->default(0)->comment('是否刪除');
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
        Schema::dropIfExists('company_basics');
    }
}
