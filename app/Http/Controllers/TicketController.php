<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Repositories\TicketRepository;
use App\Jobs\SyncTickets;

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
     public function store(Request $request)
     {
        // dd($request->all());
        //  $request->validate([
        //     'serial' => 'required|string|unique:tickets,serial'
        //  ]);
  
         SyncTickets::dispatch( $request->all());

        return response()->json('success');

     }
}
