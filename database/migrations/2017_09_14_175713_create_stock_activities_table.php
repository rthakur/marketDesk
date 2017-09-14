<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_activities', function (Blueprint $table) {
              $table->increments('id');
              $table->integer('company_id');

              $table->decimal('open_7days', 5, 2)->default(0);
              $table->decimal('open_2weeks', 5, 2)->default(0);
              $table->decimal('open_1month', 5, 2)->default(0);
              $table->decimal('open_3months', 5, 2)->default(0);

              $table->decimal('high_7days', 5, 2)->default(0);
              $table->decimal('high_2weeks', 5, 2)->default(0);
              $table->decimal('high_1month', 5, 2)->default(0);
              $table->decimal('high_3months', 5, 2)->default(0);

              $table->decimal('low_7days', 5, 2)->default(0);
              $table->decimal('low_2weeks', 5, 2)->default(0);
              $table->decimal('low_1month', 5, 2)->default(0);
              $table->decimal('low_3months', 5, 2)->default(0);

              $table->decimal('close_7days', 5, 2)->default(0);
              $table->decimal('close_2weeks', 5, 2)->default(0);
              $table->decimal('close_1month', 5, 2)->default(0);
              $table->decimal('close_3months', 5, 2)->default(0);


              $table->integer('vol_7days')->default(0);
              $table->integer('vol_2weeks')->default(0);
              $table->integer('vol_1month')->default(0);
              $table->integer('vol_3months')->default(0);

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
        Schema::dropIfExists('stock_activities');
    }
}
