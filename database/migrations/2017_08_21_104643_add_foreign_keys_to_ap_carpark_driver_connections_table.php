<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToApCarparkDriverConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ap_carpark_driver_connections', function(Blueprint $table)
		{
			$table->foreign('carpark_id', 'fk_crm_carpark_employee_connections_crm_carpark1')->references('id')->on('ap_carpark')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('driver_id', 'fk_crm_carpark_employee_connections_crm_employee1')->references('id')->on('ap_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ap_carpark_driver_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_crm_carpark_employee_connections_crm_carpark1');
			$table->dropForeign('fk_crm_carpark_employee_connections_crm_employee1');
		});
	}

}
