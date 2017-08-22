<?php

use App\Models\ApRoles;
use Illuminate\Database\Seeder;

class ApRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ["name" => "Super Admin", "id" => "super-admin"], // Manage everything
            ["name" => "Director", "id" => "director"],
            ["name" => "Driver", "id" => "driver"],
            ["name" => "Storekeeper", "id" => "storekeeper"],
            ["name" => "Manager", "id" => "manager"],
            ["name" => "Accountant", "id" => "accountant"],

        ];
        DB::beginTransaction();
        try {
            foreach ($users as $user) {
                $record = ApRoles::find($user['id']);
                if (!$record) {
                    ApRoles::create($user);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            echo 'Point of failure '. $e->getCode() . ' ' . $e->getMessage();
            throw new Exception($e);
        }
        DB::commit();
    }
}
