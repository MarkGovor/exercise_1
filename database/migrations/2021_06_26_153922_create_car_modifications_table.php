<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_modifications', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id')->index();
            $table->string('title');
            $table->date('from_made')->index();
            $table->date('to_made')->index();
            $table->integer('generation')->default(1)->index();
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
        Schema::dropIfExists('car_modifications');
    }
}
