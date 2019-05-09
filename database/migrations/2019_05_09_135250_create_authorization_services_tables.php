<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorizationServicesTables extends Migration
{
    protected $connection = 'db_passport';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)->create('authorization_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique()->comment('service名称');
            $table->string('description', 300)->comment('service描述');
            $table->timestamps();
            $table->softDeletes();
        });

        \DB::connection($this->connection)->statement("ALTER TABLE `authorization_services` comment 'service定义'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authorization_services');
    }
}
