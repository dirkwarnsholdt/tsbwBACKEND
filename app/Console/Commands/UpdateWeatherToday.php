<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UpdateWeatherToday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:weatherToday';

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
            $url = 'http://api.openweathermap.org/data/2.5/weather?id=2897132&APPID=bda63977a6ec7a89b28153d79be9232f';
            $json = file_get_contents($url);
            file_put_contents('storage/weather/weatherToday-TEMP.json', $json);

            // getting old file to overwrite
            try {
                $oldJson = 'storage/weather/weatherToday.json';
                if (file_exists($oldJson) && isJson($json)) {
                    if (unlink($oldJson)) {
                        echo('oldJson deleted');
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
