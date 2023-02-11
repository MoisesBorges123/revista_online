<?php

namespace App\Console\Commands;

use App\Jobs\ProcessAlertPublication;
use Illuminate\Console\Command;

class GerarAlertasCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gerar:alerta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gera alertas para o usuário.';

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
     * @return int
     */
    public function handle()
    {
        ProcessAlertPublication::dispatch();
    }
}
