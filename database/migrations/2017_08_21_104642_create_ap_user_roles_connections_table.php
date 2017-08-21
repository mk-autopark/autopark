<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApUserRolesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ap_user_roles_connections', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('role_id', 36)->nullable()->index('fk_crm_employee_roles_connections_crm_roles1_idx');
			$table->string('user_id', 36)->nullable()->index('fk_crm_employee_roles_connections_crm_employee1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ap_user_roles_connections');
	}

}
