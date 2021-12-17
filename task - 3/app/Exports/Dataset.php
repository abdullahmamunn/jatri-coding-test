<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Dataset implements ToArray, WithHeadingRow
{
    public function array(array $array)
    {
       return $array;
    }
}