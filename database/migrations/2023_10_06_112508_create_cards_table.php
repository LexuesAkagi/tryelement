<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('attribute', 25);
            $table->tinyInteger('score')->unsigned();
            $table->string('image_path', 100);
        });
    }

    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
