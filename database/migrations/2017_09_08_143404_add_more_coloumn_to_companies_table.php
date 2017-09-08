<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColoumnToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->float('dividend_yield')->nullable();
            $table->integer('research_rank')->nullable();
            $table->integer('rank_id')->nullable();

            $table->float('p_e')->nullable();
            $table->integer('sector_id')->nullable();
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
              $table->dropColumn('dividend_yield');
              $table->dropColumn('research_rank');
              $table->dropColumn('rank_id');

              $table->dropColumn('p_e');
              $table->dropColumn('sector_id');
        });
    }
}
