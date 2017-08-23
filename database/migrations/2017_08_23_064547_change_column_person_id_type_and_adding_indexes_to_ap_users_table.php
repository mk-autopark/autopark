<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnPersonIdTypeAndAddingIndexesToApUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ap_users', function (Blueprint $table) {
            $table->string('person_id')->change()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ap_users', function (Blueprint $table) {
            $table->integer('person_id')->change();
            $table->dropUnique(['person_id']);
        });
    }
}