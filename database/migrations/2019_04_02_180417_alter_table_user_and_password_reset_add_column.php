<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUserAndPasswordResetAddColumn extends Migration
{
    protected $connection = 'db_passport';
    protected $userTable = 'users';
    protected $passwordResetsTable = 'password_resets';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)->table($this->userTable, function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::connection($this->connection)->table($this->passwordResetsTable, function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)->table($this->userTable, function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::connection($this->connection)->table($this->passwordResetsTable, function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
