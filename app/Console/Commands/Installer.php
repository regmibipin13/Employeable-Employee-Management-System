<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Installer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ems:install {dbname} {dbport} {username} {password?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs the application';

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
        $this->info('Dont Forget to change the .env credentials and run composer install before doing this step');
        $this->runMigrateAndSeeds();
        $this->runNodes();
        $this->success('Application installed successfully');
    }


    private function runMigrateAndSeeds()
    {
        \Artisan::call('migrate');
        \Artisan::call('db:seed');
    }

    private function runNodes()
    {
        $process = new Process(['npm install && npm run production']);
        $process->run();

        \Artisan::call('key:generate');
        \Artisan::call('optimize:clear');
    }




}












