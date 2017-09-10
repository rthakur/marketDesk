<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraColumnIndustryCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('companies', function (Blueprint $table) {
          $table->string('industry')->nullable();
          $table->integer('nsc_500')->default(0);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('industry');
            $table->dropColumn('nsc_500');
      });
    }
}
