<?php

namespace App\Http\Controllers;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets');
    }
}
