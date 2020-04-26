<?php

namespace App\Http\Livewire;

use App\Ticket;
use Illuminate\Support\Collection;
use Livewire\Component;

class TicketsList extends Component
{
    /** @var Ticket[]|Collection */
    public $tickets;

    /** @var int */
    public $selectedTicketId;

    /** @var string */
    public $search;

    public function render()
    {
        $this->refreshTickets();
        return view('livewire.tickets-list');
    }

    private function refreshTickets()
    {
        $query = Ticket::query();

        if (!empty($this->search)) {
            $query->where('subject', 'like', $this->search.'%');
        }

        $this->tickets = $query->get();

        if (!$this->tickets->count() or !$this->tickets->contains('id', $this->selectedTicketId)) {
            $this->onTicketSelected(null);
        }
    }

    public function onTicketSelected($ticketId)
    {
        $this->selectedTicketId = $ticketId;
        $this->emit('ticketSelected', ['ticketId' => $ticketId]);
    }
}
