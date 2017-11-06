@extends('master')
@section('body')
    <div class="row" style="margin-top: 30px;">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                </div>

                <div class="panel-body">
                    @include('Partials._message')

                    <div class="ticket-info">
                        <p>{{ $ticket->message }}</p>
                        <p>Category: {{ $category->name }}</p>
                        <p>
                            @if ($ticket->status === 'Open')
                                Status: <span class="label label-success">{{ $ticket->status }}</span>
                            @else
                                Status: <span class="label label-danger">{{ $ticket->status }}</span>
                            @endif
                        </p>
                        <p style="margin-top: 3px;">
                            @if($ticket->status === 'Open')
                                Action: <a href="{{route('user_ticket_close',['t_id' => encrypt($ticket->ticket_id)])}}"  class="label label-danger">Close Ticket</a>
                            @endif
                        </p>
                        <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>

                    <hr>

                    <div class="comments">
                        @foreach ($comments as $comment)
                            <div class="panel panel-@if($ticket->user->id === $comment->user_id){{"default"}}@else{{"success"}}@endif">
                                <div class="panel panel-heading">
                                    <p>{{ $comment->user->fullname }} <span class="pull-right"> {{\Carbon\Carbon::parse($comment->created_at) }}</span></p>
                                </div>

                                <div class="panel panel-body">
                                    {{ $comment->comment }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="comment-form">
                        @include('Partials._message')
                        <form action="{{route('user_comment_post') }}" method="POST" class="form">
                            {!! csrf_field() !!}
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea rows="10" id="comment" class="form-control p-input" name="comment" placeholder="Comment Here!"></textarea>
                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                @if($ticket->status === 'Open')
                                    <button type="submit" class="btn btn-primary"><span class="fa fa-send"></span>&nbsp;Submit</button>
                                @else
                                    <p class="alert alert-danger"> This Ticket Has Been Closed. Please Create A New Ticket </p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection