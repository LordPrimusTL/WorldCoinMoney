@extends('adminMaster')
@section('body')
    <div class="container" style="margin-top:30px;  margin-left: 30px;" >
        <div class="row">
            <h2> Transaction</h2>
            @include('Partials._message')
            <table class="table table-responsive table-bordered">
                <thead>
                <th>Date</th>
                <th>ID</th>
                <th>User</th>
                <th>Amount</th>
                <th>Note</th>
                <th>Type</th>
                <th>Status</th>
                </thead>
                <tbody>
                <?php $i = 1?>
                @foreach($trans as $u)
                    <tr class="alert alert-@if($u->ts_id == 1 || $u->ts_id == 7)success @elseif($u->ts_id == 2 || $u->ts_id == 5 || $u->ts_id == 6)danger @elseif($ts_id == 3 || $u->ts_id == 6)warning @endif">
                        <td>{{\Carbon\Carbon::parse($u->created_at)}}</td>
                        <td>{{$u->t_id}}</td>
                        <td><a href="{{route('admin_user_view',['id' => encrypt($u->user_id)])}}" class="btn btn-primary btn-sm">{{$u->user->email}}</a> </td>
                        <td>{{$u->amount}}</td>
                        <td>{{$u->descn}}</td>
                        <td>{{$u->ttype->type}}</td>
                        <td>{{$u->stat->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection