<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;


/**
 * Class deletePostsCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class GeneratePassword extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "generate:password {password}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Generate a hashed password";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $password = $this->argument('password');


        $this->info(Hash::make($password));
    }
}