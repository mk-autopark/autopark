<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToApHistoryFuelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ap_history_fuel', function(Blueprint $table)
		{
			$table->foreign('driver_car_id', 'fk_crm_history_fuel_crm_carpark_employee_connections1')->references('id')->on('ap_carpark_driver_connections')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_crm_history_fuel_crm_employee1')->references('id')->on('ap_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ap_history_fuel', function(Blueprint $table)
		{
			$table->dropForeign('fk_crm_history_fuel_crm_carpark_employee_connections1');
			$table->dropForeign('fk_crm_history_fuel_crm_employee1');
		});
	}

}
