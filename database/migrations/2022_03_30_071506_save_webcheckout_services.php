<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SaveWebcheckoutServices extends Migration
{

    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
                $table->unsignedInteger('requestId')->default(null)->nullable();
                $table->string('requestStatus')->default(null)->nullable();
                $table->timestamp('requestDate')->nullable()->default(null);
        });
    }

    public function down()
    {
        //
    }
}
