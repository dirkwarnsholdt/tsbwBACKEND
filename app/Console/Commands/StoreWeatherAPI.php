<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class StoreWeatherAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:storeweatherapi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches new Data the first time for /weather';

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
        $url = 'http://api.openweathermap.org/data/2.5/weather?id=2897132&APPID=bda63977a6ec7a89b28153d79be9232f';
        $json = file_get_contents($url);
        $request = Request::create('weather/', 'POST', array(
            "content"   => $json
        ));
        return Route::dispatch($request)->getContent();
    }
}
