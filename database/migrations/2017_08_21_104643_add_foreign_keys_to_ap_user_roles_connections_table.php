<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToApUserRolesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ap_user_roles_connections', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_crm_employee_roles_connections_crm_employee1')->references('id')->on('ap_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('role_id', 'fk_crm_employee_roles_connections_crm_roles1')->references('id')->on('ap_roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ap_user_roles_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_crm_employee_roles_connections_crm_employee1');
			$table->dropForeign('fk_crm_employee_roles_connections_crm_roles1');
		});
	}

}
