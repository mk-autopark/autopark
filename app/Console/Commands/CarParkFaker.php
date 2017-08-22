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

    /*function getRandomString($length = 3)
    {
        $faker = Factory::create();

        $randomLicense = '';

        for ($i = 0; $i < $length; $i++) {


            $randomLicense = 'T' . $faker->numberBetween($min = 10000, $max = 99999);

        }
        return $randomLicense;
    }*/

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 1000; $i++) {

            $randomLicense = null;
            while (!$randomLicense) {

                $randomLicense = 'T' . str_pad ($faker->numberBetween($min = 0, $max = 99999), 5, '0', STR_PAD_LEFT);

                if (ApCarPark::where('license_plate', $randomLicense )->get()->isNotEmpty())
                    $randomLicense = null;
            }

            ApCarPark::create([
                'id' => Uuid::uuid4(),
                'manufacturer' => $faker->randomElement($array = array ('Audi','Bmw','Citroen','Renault','Toyota','Mercedes-Benz','Volkswagen')),
                'model' => $faker->firstNameFemale,
                'average_fuel_consumption' => $faker->randomFloat($nbMaxDecimals = 1, $min = 4, $max = 15),
                'license_plate' => $randomLicense,
            ]);
        }
    }
}
