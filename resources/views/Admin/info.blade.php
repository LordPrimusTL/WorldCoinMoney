@extends('adminMaster')
@section('body')
    <div class="container" style="margin-top:30px;  margin-left: 30px;" >
        <div class="row">
            <h2> Sent Messages</h2>
            <div class="col-lg-12">@include('Partials._message')</div>
            <div class="col-lg-8">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <th>Date</th>
                    <th>Recipient</th>
                    <th>Message</th>
                    <th>Priority</th>
                    <th>Status</th>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($info as $u)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($u->created_at)}}</td>
                            <td><a href="{{route('admin_user_view',['id' => encrypt($u->user->id)])}}" class="btn btn-primary btn-sm">{{$u->user->email}}</a> </td>
                            <td>{{$u->message}}</td>
                            <td>{{$u->priority}}</td>
                            <td>{{$u->read_count < 3 ? 'Delivered' : 'Read'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3" style="margin-left: 10px;">
                <h4 class="card-title" style="margin-top: 15px; font-family: 'Andale Mono'" > Add Message</h4>
                <form action="{{route('admin_info_post')}}" method="POST">
                    {{csrf_field()}}
                    <label for="user_id">To:</label>
                    <div class="form-group">
                        <select class="form-control" name="user_id" id="user_id">
                            <?php $user = \App\User::where('role_id','3')->get()?>
                            @foreach($user as $s)
                                <option {{$id != null? $id === $s->id ? 'selected' :'':''}} value="{{$s->id}}"> {{"$s->fullname ($s->email)"}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="message">Message:</label>
                    <div class="form-group">
                        <textarea type="text" class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                    </div>
                    <label for="priority">Priority: </label>
                    <div class="form-group">
                        <select class="form-control" name="priority" id="priority">
                            <option value="HIGH">HIGH</option>
                            <option value="MEDIUM">MEDIUM</option>
                            <option value="LOW">LOW</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit"><span><i class="fa fa-send"></i></span> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection