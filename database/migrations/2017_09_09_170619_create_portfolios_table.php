<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('company_id');
            $table->integer('qty')->default(0);
            $table->string('cmp')->default(0);
            $table->string('acp')->default(0);
            $table->string('book_loss')->default(0);
            $table->string('target')->default(0);
            $table->integer('type')->default(0);
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
        Schema::dropIfExists('portfolios');
    }
}
