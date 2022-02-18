<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createimagestable extends Migration
{
   
    public function up()
    {
        Schema::create('images', function(Blueprint $table){
            $table->id();
            $table->string('path');
            $table->timestamps();
            $table->morphs('imageable');
        });
    }

    public function down()
    {
        //
    }
}