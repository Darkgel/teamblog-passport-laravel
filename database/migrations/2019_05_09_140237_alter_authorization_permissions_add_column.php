<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAuthorizationPermissionsAddColumn extends Migration
{
    protected $connection = 'db_passport';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)->table('authorization_permissions', function (Blueprint $table) {
            $table->integer('service_id')->comment('对应authorization_services表中的id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)->table('authorization_permissions', function (Blueprint $table) {
            $table->dropColumn(['service_id']);
        });
    }
}
