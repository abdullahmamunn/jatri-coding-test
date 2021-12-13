<?php
namespace App\Repositories;
use App\Models\Ticket;

class TicketRepository
{
    public function all()
    {
        return Ticket::where('amount', '>', 20)
                       ->get()
                       ->map(function($tickets){
                           return[
                               'serial' => $tickets->serial,
                               'from_station' => $tickets->from_counter,
                               'to_station' => $tickets->to_counter,
                               'amount' => $tickets->amount,
                               'created_at' => $tickets->created_at,
                           ];
                       });
    }

    public function findTicket($ticket)
    {
        return $tickets = Ticket::findOrfail($ticket);
    }
}

?>