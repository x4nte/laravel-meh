<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating user admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = 'admin@mail.ru';
        $password = 'password';

        $user = User::create([
            'name' => 'admin',
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => true,
        ]);

        $this->info("Admin user created successfully!");
        $this->info("Email: {$email}");
        $this->info("Password: {$password}");

        return 0;
    }
}
