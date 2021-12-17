<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TicketRepository;


class TicketController extends Controller
{
    private $ticket;

    public function __construct(TicketRepository $ticket)
    {
        $this->ticket = $ticket;
    }

     public function store(Request $request)
     {
        // dd($request->all());
        //  $request->validate([
        //     'serial' => 'required|string|unique:tickets,serial'
        //  ]);
        return $this->ticket->storeTicket($request->all());

     }
}
