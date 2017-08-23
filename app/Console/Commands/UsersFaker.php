<?php

namespace App\Console\Commands;

use App\Models\ApUsers;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;

class UsersFaker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fake:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate fake users data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->userData();
    }

    public function userData()
    {

        $faker = Factory::create();

        for ($i = 0; $i < 500; $i++) {

            $persons = null;
            while (!$persons) {

                $firstNumbers = $faker->numberBetween($min = 3, $max = 4);
                $bDate = substr(Carbon::create(rand(1980, 2000), rand(1, 12), rand(1, 31), rand(0, 23), rand(0, 59), rand(0, 59))->format('Ymd'), -6);
                $fourDigits = (str_pad($faker->numberBetween($min = 0, $max = 9999), 4, '0', STR_PAD_LEFT));

                $persons = $firstNumbers . $bDate . $fourDigits;

                if (ApUsers::where('person_id', $persons)->get()->isNotEmpty())
                    $persons = null;
            }

            $phone_number = null;
            while (!$phone_number) {
                $phone_number = '86' . str_pad($faker->numberBetween($min = 0, $max = 9999999), 7, '0', STR_PAD_LEFT);


                if (ApUsers::where('phone', $phone_number)->get()->isNotEmpty())
                    $phone_number = null;
            }

            $record = ApUsers::create([
                'id' => Uuid::uuid4(),
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'residential_address' => $faker->address,
                'person_id' => $persons,
                'phone' => $phone_number,
                'email' => $faker->email,
                'password' => 'test12',
            ]);
            $record->role()->sync('driver');
        }

    }
}
