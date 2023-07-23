<?php

namespace Hero\HelloComposer\Console\Commands;

use Illuminate\Console\Command;

class HiComposer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hi-composer:hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'say hello for this package';

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
        echo "hello hi-composer!!";
        return 0;
    }
}
