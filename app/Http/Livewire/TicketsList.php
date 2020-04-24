<?php

namespace App\Http\Livewire;

use App\Ticket;
use Livewire\Component;

class TicketsList extends Component
{
    /** @var Ticket[] */
    public $tickets;

    /** @var int */
    public $selectedTicketId;

    /** @var string */
    public $search;

    public function onTicketClick($ticketId)
    {
        $this->selectedTicketId = $ticketId;
        $this->emit('ticketSelected', ['ticketId' => $ticketId]);
    }

    private function refreshTickets()
    {
        $query = Ticket::query();
        if (!empty($this->search)) {
            $query->where('subject', 'like', $this->search.'%');
        }

        $this->tickets = $query->get();

        if (!$this->tickets->count() or !$this->tickets->contains('id', $this->selectedTicketId)) {
            $this->onTicketClick(null);
        }
    }

    public function render()
    {
        $this->refreshTickets();
        return view('livewire.tickets-list');
    }
}
