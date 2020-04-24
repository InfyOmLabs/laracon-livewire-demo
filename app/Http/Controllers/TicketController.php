<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets', [
            'tickets' => Ticket::all(),
            'comments' => Ticket::find(1)->comments
        ]);
    }
}
