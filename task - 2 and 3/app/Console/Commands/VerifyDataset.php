<?php

namespace App\Console\Commands;

use App\Exports\Dataset;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class VerifyDataset extends Command
{
//    Division index based on Excel file
    private static $SHEETS = ['Dhaka', 'Chattogram', 'Rajshahi', 'TestDataSets'];

    protected $dataset;
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

        $this->dataset = Excel::toArray(new Dataset(), storage_path('sample.xlsx'));
        //dd($this->dataset);
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        foreach ($this->dataset[$this->findSheetKey('TestDataSets')] as $testRow)
        {
            $this->line('SL:'. $testRow['sl'] . ' | lat: ' . $testRow['lat'] . '| lng: ' . $testRow['lng'] . '| Division: ' . $testRow['division']);
            $matched = $this->checkIsMatched($testRow);
            if ($matched) {
                $this->info('Yes!');
            } else {
                $this->warn('No!');
            }
            $this->newLine();
        }
    }

    /**
     * @param $testRow
     * @return string
     */
    private function checkIsMatched($testRow): string
    {
        $division = $this->dataset[$this->findSheetKey($testRow['division'])];
        foreach ($division as $location) {
            if ($location['lat'] == $testRow['lat'] && $location['lng'] == $testRow['lng']) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $needle
     * @return false|int|string
     */
    private function findSheetKey($needle)
    {
        return array_search($needle, VerifyDataset::$SHEETS);
    }
}