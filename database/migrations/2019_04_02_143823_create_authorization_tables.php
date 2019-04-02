<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorizationTables extends Migration
{
    protected $connection = 'db_passport';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)->create('authorization_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('slug', 50);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::connection($this->connection)->create('authorization_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('slug', 50);
            $table->string('http_method')->nullable();
            $table->text('http_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::connection($this->connection)->create('authorization_role_users', function (Blueprint $table) {
            $table->integer('role_id');
            $table->integer('user_id');
            $table->index(['role_id', 'user_id']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::connection($this->connection)->create('authorization_role_permissions', function (Blueprint $table) {
            $table->integer('role_id');
            $table->integer('permission_id');
            $table->index(['role_id', 'permission_id']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::connection($this->connection)->create('authorization_user_permissions', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('permission_id');
            $table->index(['user_id', 'permission_id']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::connection($this->connection)->create('authorization_operation_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('path');
            $table->string('method', 10);
            $table->string('ip');
            $table->text('input');
            $table->index('user_id');
            $table->timestamps();
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
        Schema::connection($this->connection)->dropIfExists('authorization_roles');
        Schema::connection($this->connection)->dropIfExists('authorization_permissions');
        Schema::connection($this->connection)->dropIfExists('authorization_role_users');
        Schema::connection($this->connection)->dropIfExists('authorization_role_permissions');
        Schema::connection($this->connection)->dropIfExists('authorization_user_permissions');
        Schema::connection($this->connection)->dropIfExists('authorization_operation_log');
    }
}
