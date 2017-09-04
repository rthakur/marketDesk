<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('nse_code')->nullable();
            $table->string('open')->nullable();
            $table->string('high')->nullable();
            $table->string('low')->nullable();
            $table->string('close')->nullable();
            $table->string('high_52_weeks')->nullable();
            $table->string('low_52_weeks')->nullable();
            $table->string('volume')->nullable();
            $table->string('change')->nullable();
            $table->string('book_value')->nullable();
            $table->string('market_cap')->nullable();
            $table->string('rsi')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
