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
            $table->foreignId('product_id')
                ->constrained();
            $table->string('file_name',40);
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
