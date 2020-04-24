@extends('layouts.app')

@section('content')
    <div class="card">
        <h5 class="card-header">Tickets</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="input-group">
                        <input type="text" class="form-control" id="txtSearch" placeholder="Search">
                    </div>
                    <div class="tickets-list">
                        @foreach ($tickets as $ticket)
                            <div class="ticket">
                                <h5 class="card-title">{{ $ticket->subject }}</h5>
                                <p class="card-text">{{ $ticket->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8">
                    <h3>Comments</h3>
                    <div class="comments-list">
                        @foreach ($comments as $comment)
                            <div class="comment">
                                <p class="card-subtitle mb-2 text-muted">{{ $comment->created_at->diffForHumans() }}</p>
                                <p class="card-text">Quick sample text to create the card title and make up the body of the
                                    card's content.</p>
                            </div>
                        @endforeach

                    </div>
                    <div>
                        <h4>New Comment</h4>
                        <div class="form-group">
                            <textarea name="new_comment" id="txtNewComment" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary float-right">Comment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
