<?php

namespace App\Http\Livewire;

use App\Comment;
use App\Ticket;
use Illuminate\Support\Collection;
use Livewire\Component;

class CommentsList extends Component
{
    /** @var Comment[]|Collection */
    public $comments;

    /** @var string */
    public $newCommentMessage;

    /** @var int */
    public $ticketId;

    protected $listeners = [
        'ticketSelected'
    ];

    public function ticketSelected($params)
    {
        $this->ticketId = $params['ticketId'];
        $this->refreshComments();
    }

    private function refreshComments()
    {
        if (is_null($this->ticketId)) {
            $this->comments = [];
            return;
        }

        $this->comments = Ticket::find($this->ticketId)->comments;
    }

    public function addComment()
    {
        $comment = new Comment([
            'message' => $this->newCommentMessage,
            'ticket_id' => $this->ticketId
        ]);
        $comment->save();
        $this->newCommentMessage = '';
        $this->refreshComments();
    }

    public function mount()
    {
        $this->refreshComments();
    }

    public function render()
    {
        return view('livewire.comments-list');
    }
}
