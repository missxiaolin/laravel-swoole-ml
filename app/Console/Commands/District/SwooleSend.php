<?php

namespace App\Console\Commands\District;

use App\Core\Swoole\Test\TestClient;
use Illuminate\Console\Command;

class SwooleSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'district:swoole:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '发送拿到经纬度测试';

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
            $begin_time = microtime(true);
            dump(TestClient::getInstance()->predict(39.9223757639, 116.4221191406));
            $end_time = microtime(true);
            dump('swoole 处理时间为:' . ($end_time - $begin_time));
        } catch (\Exception $e) {
            dump($e->getMessage());
        }
    }
}
