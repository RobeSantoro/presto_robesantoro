<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class makeUserRevisor extends Command
{
    protected $signature = 'presto:makeUserRevisor';
    protected $description = 'make user revisor';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $email = $this->ask("Insert user email");
        $user = User::where('email' , $email)->first();

        if (!$user) {
            $this->error("User not found");
            return;
        }

        $user->is_revisor = true;
        $user->save();
        $this->info('User {$user->name} is now a Revisor');
    }
}
