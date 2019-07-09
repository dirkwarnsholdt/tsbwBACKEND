<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateWeatherForecast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:UpdateWeatherForecast';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches new Data for /weatherForecast every 10 Minutes';

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
    
    public function isJson($json) {
        $result = json_decode($json);
        if (json_last_error() === JSON_ERROR_NONE) {
            return true;
        }
        return false;
    }
    
    public function handle()
    {
        // downloading and preparing json
        try {
            $oldJson = 'public/weather/weatherForecast.json';
            $url = 'http://api.openweathermap.org/data/2.5/forecast?id=2897132&APPID=bda63977a6ec7a89b28153d79be9232f';
            $json = file_get_contents($url);
            $path = realpath('public/weather');

            if (!file_exists($oldJson) && !empty($json)) {
                file_put_contents('public/weather/weatherForecast.json', $json);
            }

            if (!empty($json)) {
                file_put_contents('public/weather/weatherForecast-TEMP.json', $json);
            }

            // getting old file to overwrite
            try {
                if (file_exists($oldJson) && $this->isJson($json)) {
                    if (unlink($oldJson)) {
                        echo('oldJson deleted');
                        rename($path . '/weatherForecast-TEMP.json', $path . '/weatherForecast.json');
                    }
                    else {
                        echo('Error deleting oldJson');
                    }
                }
            } catch (Exception $e) { echo('ERROR oldJson-TryCatch'); }

        } catch (Exception $e) {
            echo('ERROR wrapper-tryCatch');
            // only happens, when API
            // is having problems, so nothing I should
            // worry about :)
        }
    }
}
