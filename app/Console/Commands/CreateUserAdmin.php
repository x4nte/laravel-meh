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
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('eternaldaler'),
            'is_admin' => true,
        ]);
        return 0;
    }
}
