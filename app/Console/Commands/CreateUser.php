<?php

namespace App\Console\Commands;

use App\Models\Issue;
use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new User';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        // Get the user input
        $name = $this->ask('Enter name');
        $email = $this->ask('Enter email');
        $password = bcrypt($this->secret('What is the password?'));
        $role = $this->choice('Enter role',['QA','dev']);

        $departments=Issue::query()->select('department')->get()->pluck('department')->unique()->toArray();

        $dept = $role == 'QA' ? '': $this->choice('Enter dept',$departments);

        // Create the user
        $user = new User([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'department' => $dept
        ]);

        // Save the user
        $user->save();

        // Display a success message
        $this->info('User created successfully!');
    }
}
