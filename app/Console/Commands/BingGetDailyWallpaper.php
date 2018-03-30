<?php

namespace proxata\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BingGetDailyWallpaper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bing:wallpaper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the Wallpaper of the day from Bing.com';

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
        $this->getWallpaper(config('bing.base_path').$this->getWallpaperUrl());
    }

    public function getWallpaperUrl()
    {
        $data = json_decode(file_get_contents(config('bing.json_path')), true);

        return $data['images'][0]['url'];
    }

    public function getWallpaper(string $url)
    {
        $image = file_get_contents($url);
        return Storage::disk('public')->put('background.jpg', $image);
    }
}
