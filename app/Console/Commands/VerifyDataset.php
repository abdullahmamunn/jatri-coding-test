<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class VerifyDataset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:verify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify data from dataset';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        Excel::import(new Dataset(), storage_path('sample.xlsx'));
        
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
