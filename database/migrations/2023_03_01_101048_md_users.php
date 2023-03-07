<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MdUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('md_users', function (Blueprint $table) {
            $table->id();
            $table->string('usr_name');
            $table->integer('usr_parent_id')->nullable();
            $table->string('usr_email')->unique();
            $table->string('usr_phone')->unique();
            $table->tinyInteger('usr_gender')->default('0');
            $table->string('usr_institute_name')->nullable();
            $table->integer('usr_cnt_id');
            $table->integer('usr_sts_id');
            $table->integer('usr_dis_id');
            $table->string('usr_address')->nullable();
            $table->string('usr_password')->nullable();
            $table->integer('usr_otp')->nullable();
            $table->string('usr_otp_time')->nullable();
            $table->tinyInteger('usr_status')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('md_users');
    }
}
