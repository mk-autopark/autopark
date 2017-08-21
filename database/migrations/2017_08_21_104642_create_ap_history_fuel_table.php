<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApHistoryFuelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ap_history_fuel', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->dateTime('entry_date');
			$table->integer('fuel_consumed');
			$table->string('car_id', 36);
			$table->string('user_id', 36)->index('fk_crm_history_fuel_crm_employee1_idx');
			$table->string('driver_car_id', 36)->index('fk_crm_history_fuel_crm_carpark_employee_connections1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ap_history_fuel');
	}

}
