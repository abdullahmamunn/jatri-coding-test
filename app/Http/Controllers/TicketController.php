<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Repositories\TicketRepository;

class TicketController extends Controller
{
    private $ticket;

    public function __construct(TicketRepository $ticket)
    {
        $this->ticket = $ticket;
    }

     public function index()
     {
         return $this->ticket->all();
     }
     public function show($ticket)
     {
         return $this->ticket->findTicket($ticket);
     }
}
