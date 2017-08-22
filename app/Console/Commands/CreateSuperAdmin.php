<?php

namespace App\Console\Commands;

use App\Models\ApUsers;
use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;

class CreateSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ap:superadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates super admin user';

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
        $this->comment('Creating admin user');
        $name = $this->ask('insert name');
        $surname = $this->ask('insert surname');
        $email = $this->ask('insert e-mail');
        $person_id = $this->ask('person_id');
        $residential_address = $this->ask('insert address');
        $phone = $this->ask('insert phone');
        $password = $this->secret('insert password');
        $record = ApUsers::create([
            'id' => Uuid::uuid4(),
            'name' => $name,
            'surname' => $surname,
            'person_id' => $person_id,
            'phone' => $phone,
            'e-mail' => $email,
            'residential_address' => $residential_address,
            'password' => bcrypt($password),
        ]);
        $record->role()->sync('super-admin');
    }
}
