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
            $table->increments('company_id')->comment('組織基本資料，組織服務內容為一對多，所以另開一個table，服務對象年齡層百分比為個人層級之病人年齡動態顯示，服務人數為個人層級之病人數目動態顯示，全職人數數量為人員管理之數目動態顯示');
            $table->string('company_name')->unique()->comment('組織\單位名稱');
            $table->string('user_id')->unique()->comment('聯絡人姓名');
            $table->string('tel')->unique()->comment('電話');
            $table->string('email')->unique()->comment('Email');
            $table->enum('service_area', ['city', 'suburb', 'complex'])->comment('服務地區類別');
            $table->enum('service_people', ['obstacles', 'old', 'spirit', 'Special'])->comment('服務對象類別');
            $table->string('budget')->comment('年度預算');
            $table->enum('live', ['large', 'small', 'night', 'community'])->comment('組織服務內容，居住');
            $table->string('daytime')->default('[]')->comment('組織服務內容，日間活動');
            $table->enum('job', ['Sheltered', 'Supportive'])->comment('組織服務內容，就業');
            $table->string('education')->nullable()->comment('組織服務內容，教育');
            $table->string('other')->nullable()->comment('組織服務內容，其他');
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
        Schema::dropIfExists('company_basics');
    }
}
