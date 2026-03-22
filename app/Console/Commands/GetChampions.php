<?php

namespace App\Console\Commands;

use App\Repositories\LolRepository;
use Illuminate\Console\Command;

class GetChampions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-champions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Obtener campeones';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $champions = new LolRepository();
        // Redis::set('lol_last_version', $champions->getLastLolVesion()[0]);
        // Redis::set('champions',  json_encode($champions->getChampions()));
    }
}
