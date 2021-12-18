<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,20) as $value) {
            $min = 10;
            $max = 50;
            Ticket::create([
                'serial' => rand(1,100),
                'from_counter' => Str::random(10),
                'to_counter' => Str::random(10),
                'amount' => rand ($min*10, $max*10) / 10
            ]);
        }
       
        
    }
}
