<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;
use Exception;

class SyncTickets implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tickets;

    public function __construct($tickets)
    {
        $this->tickets = $tickets;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        Ticket::insert($this->tickets);

    }
    public function failed(Exception $exception)
    {
        logger($exception->getMessage());
    }
}
