@extends('adminMaster')
@section('body')
    <div class="container">
        <div class="row">
            <div class="container header col-lg-4">
               <p class="alert alert-heading alert-info">
                    Ticket:   #{{ $ticket->ticket_id }} - {{ $ticket->title }}
               </p>
                <hr/>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <p class="alert alert-warning pull-left">{{\Carbon\Carbon::parse($ticket->created_at)}}:{{$ticket->message}}</p>
                @foreach($comments as $comment)
                    <div class="row col-lg-12">
                        @if($ticket->user_id == $comment->user_id)
                            <div class="col-lg-4">
                                <p class="alert alert-warning">{{\Carbon\Carbon::parse($comment->created_at)}}: {{$comment->comment}}</p>
                            </div>
                        @else
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <p class="alert alert-success">{{\Carbon\Carbon::parse($comment->created_at)}}: {{$comment->comment}}</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="col-lg-1"></div>
        </div>
        @include('Partials._message')
        <form action="{{route('admin_ticket_comment_post')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group col-lg-12">
                <input type="hidden" id="ticket_id" name="ticket_id" value="{{$ticket->id}}"/>
                <input type="text" autofocus class="form-control" required placeholder="Type Here..." id="message" name="message"/>
            </div>
            <div class="form-group col-lg-12 pull-right">
                <button class="btn btn-success pull-right"><i class="fa fa-send"></i> Send Message</button>
            </div>
        </form>
    </div>
@endsection