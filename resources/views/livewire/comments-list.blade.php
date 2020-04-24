<div class="col-lg-8">
    @if(!is_null($ticketId))
        <h3>Comments ({{ $comments->count() }})</h3>
        <div class="comments-list">
            @foreach ($comments as $comment)
                <div class="comment">
                    <p class="card-subtitle mb-2 text-muted">{{ $comment->created_at->diffForHumans() }}</p>
                    <p class="card-text">{{ $comment->message }}</p>
                </div>
            @endforeach
        </div>
        <div>
            <h4>New Comment</h4>
            <div class="form-group">
            <textarea name="new_comment" id="txtNewComment" class="form-control" rows="5" required
                      wire:model="newCommentMessage">
            </textarea>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary float-right" wire:click="addComment()">
                    Comment
                </button>
            </div>
        </div>
    @else
        <p>No Ticket Selected</p>
    @endif
</div>
