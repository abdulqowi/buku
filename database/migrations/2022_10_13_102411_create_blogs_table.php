<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('isbn')->nullable();
            $table->string('image')->nullable();
            $table->string('dimension')->nullable();
            $table->string('year')->nullable();
            $table->text('page')->nullable();
            $table->text('synopsis')->nullable();
            $table->decimal('price',10,0)->nullable();
            $table->string('tokped')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
