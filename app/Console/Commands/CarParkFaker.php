<?php

namespace App\Console\Commands;

use App\Models\ApCarPark;
use Faker\Factory;
use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;

class CarParkFaker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fake:carpark';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates fake car park data';

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
     * Generates non repetitive symbols for random string
     *
     * @return mixed
     */

    function getRandomString($length = 3)
    {
        $faker = Factory::create();
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $randomString = '';
        $randomNumber = '';
        $randomLicense = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[mt_rand(0, strlen($characters) - 1)];
            $randomNumber .= $numbers(rand(0, strlen($numbers) - 1));
            $randomLicense = $faker->numberBetween($min = 1000, $max = 9000)

        }
        return $randomLicense;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 100; $i++) {

            $licensePlate = null;
            while (!$licensePlate) {
                $licensePlate = $this->getRandomString();
                if (ApCarPark::find($licensePlate))
                    $licensePlate = null;
            }
            Airports::create([
                'id' => Uuid::uuid4(),
                'manufacturer' => $faker->company,
                'model' => $faker->city,
                'average_fuel_consumption' => Countries::all()->random()->id
          //  'license_plate' => $faker->
            ]);

           //protected $fillable = ['id', 'count', 'manufacturer','model','average_fuel_consumption','license_plate'];
        }
    }
}
