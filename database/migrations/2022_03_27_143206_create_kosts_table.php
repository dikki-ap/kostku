<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('period_time');
            $table->integer('rating');
            $table->string('districts');
            $table->string('city');
            $table->text('address');
            $table->string('url_location')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('bathroom')->default(0);
            $table->integer('bed')->default(0);
            $table->integer('ac')->default(0);
            $table->foreignId('category_id');
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
        Schema::dropIfExists('kosts');
    }
}
