<div class="col-lg-4">
    <div class="input-group">
        <input type="text" class="form-control" id="txtSearch" placeholder="Search" wire:model="search">
    </div>
    <div class="tickets-list">
        @foreach ($tickets as $ticket)
            <div class="ticket {{ $selectedTicketId == $ticket->id ? 'active': '' }}"
                 wire:click="onTicketClick('{{ $ticket->id }}')">
                <h5 class="card-title">{{ $ticket->subject }}</h5>
                <p class="card-text">{{ $ticket->description }}</p>
            </div>
        @endforeach
    </div>
</div>
