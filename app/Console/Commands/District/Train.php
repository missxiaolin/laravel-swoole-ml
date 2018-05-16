<?php

namespace App\Console\Commands\District;

use Illuminate\Console\Command;
use App\Support\Train as TrainRepository;

class Train extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'district:train:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '经纬度训练测试';

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
        $res = TrainRepository::getInstance()->predict([39.9223757639, 116.4221191406]);
        dump($res);
    }
}
