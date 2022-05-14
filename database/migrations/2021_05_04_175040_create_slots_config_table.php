<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots_config', function (Blueprint $table) {
            $table->increments('slots_config_id');
            $table->tinyInteger('no_of_day');
            $table->time('available_start_time')->nullable();
            $table->time('available_end_time')->nullable();
            $table->time('unavailable_start_time')->nullable();
            $table->time('unavailable_end_time')->nullable();
            $table->timestamps()->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots_config');
    }
}
