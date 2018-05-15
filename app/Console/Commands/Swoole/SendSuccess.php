<?php

namespace App\Console\Commands\Swoole;

use App\Core\Swoole\Test\TestClient;
use Illuminate\Console\Command;

class SendSuccess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swoole:send:success';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'success测试';

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
        $result = TestClient::getInstance()->returnString();
        dump($result);
    }
}
