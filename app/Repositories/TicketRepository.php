<?php
namespace App\Repositories;

use App\Jobs\SyncTickets;

class TicketRepository implements TicketRepositoryInterface
{
   
    public function storeTicket($data)
    {
        SyncTickets::dispatch($data);

        return response('success');
    }
   
}

?>