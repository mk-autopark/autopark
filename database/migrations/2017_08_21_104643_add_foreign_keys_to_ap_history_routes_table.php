<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToApHistoryRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ap_history_routes', function(Blueprint $table)
		{
			$table->foreign('connection_id', 'fk_crm_history_routes_crm_carpark_employee_connections1')->references('id')->on('ap_carpark_driver_connections')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ap_history_routes', function(Blueprint $table)
		{
			$table->dropForeign('fk_crm_history_routes_crm_carpark_employee_connections1');
		});
	}

}
