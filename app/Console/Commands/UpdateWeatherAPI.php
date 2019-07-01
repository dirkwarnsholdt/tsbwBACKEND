<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateWeatherAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updateweatherapi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches new Data for /weather every 10 Minutes';

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
        echo 'abc';
    }
}
