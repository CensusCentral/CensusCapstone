<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempPwdTable extends Migration
{
    public function up()
    {
        Schema::create('temp_pwd', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'head' or 'member'
            $table->unsignedBigInteger('reference_id'); // Reference ID for either Isfhead or Isfmember
            $table->string('last_name');
            $table->string('first_name');
            $table->string('disability');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_pwd');
    }
}
