<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        try {
            $url = 'http://api.openweathermap.org/data/2.5/weather?id=2897132&APPID=bda63977a6ec7a89b28153d79be9232f';
            $json = file_get_contents($url);
            file_put_contents('./weather/weatherToday.json', $json)

        } catch (Exception $e) {
            echo('UPDATEweatherApi -- $json === empty');
            // only happens, when API
            // is having problems, so nothing I should
            // worry about :)
        }
    }
}
