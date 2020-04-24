<?php

namespace App\Http\Livewire;

use App\Comment;
use Illuminate\Support\Collection;
use Livewire\Component;

class CommentsList extends Component
{
    /** @var Comment[]|Collection */
    public $comments;

    /** @var int */
    public $ticketId;

    /** @var string */
    public $newCommentMessage;

    protected $listeners = [
        'ticketSelected' => 'onTicketSelected'
    ];

    public function onTicketSelected($params)
    {
        $this->ticketId = $params['ticketId'];
        $this->refreshComments();
    }

    public function mount()
    {
        $this->refreshComments();
    }

    private function refreshComments()
    {
        if (is_null($this->ticketId)) {
            $this->comments = [];
            return;
        }

        $this->comments = Comment::whereTicketId($this->ticketId)->get();
    }

    public function addComment()
    {
        $comment = new Comment(
            [
                'message' => $this->newCommentMessage,
                'ticket_id' => $this->ticketId
            ]
        );
        $comment->save();
        $this->newCommentMessage = '';
        $this->refreshComments();
    }

    public function render()
    {
        return view('livewire.comments-list');
    }
}
