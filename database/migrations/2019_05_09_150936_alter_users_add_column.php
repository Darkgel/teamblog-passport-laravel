<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersAddColumn extends Migration
{
    protected $connection = 'db_passport';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)->table('users', function (Blueprint $table) {
            $table->tinyInteger('type')->default(0)->comment('用户类型，具体定义参考相应的model');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)->table('users', function (Blueprint $table) {
            $table->dropColumn(['type']);
        });
    }
}
