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
            $table->increments('id')->comment('子公司/子組織編號');
            $table->integer('company_id')->nullable()->comment('公司編號');
            $table->string('sub_company_name')->comment('子公司/子組織名稱');
            $table->string('sub_company_description')->comment('子公司/子組織簡介');
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
