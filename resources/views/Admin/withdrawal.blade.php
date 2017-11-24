@extends('adminMaster')
@section('body')
    <div class="container" style="margin-top:30px;  margin-left: 30px;" >
        <div class="row">
            <h2> Withdrawal Request</h2>
            <div class="col-lg-12">@include('Partials._message')</div>
            <table class="table table-responsive table-bordered">
                <thead>
                <th>Date</th>
                <th>ID</th>
                <th>User</th>
                <th>Amount</th>
                <th>Transaction ID</th>
                <th>TName</th>
                <th>Action/Status</th>
                </thead>
                <tbody>
                <?php $i = 1?>
                @foreach($with as $u)
                    <tr class="
                        @if($u->ts_id == 1|| $u->ts_id == 7)
                            alert-success
                        @elseif($u->ts_id == 3 || $u->ts_id == 6)
                            alert-warning
                        @elseif($u->ts_id == 5 || $u->ts_id == 4 || $u->ts_id == 2)
                            alert-danger
                        @endif">
                        <td>{{\Carbon\Carbon::parse($u->created_at)}}</td>
                        <td>{{$u->w_id}}</td>
                        <td><a href="{{route('admin_user_view',['id' => encrypt($u->user_id)])}}" class="btn btn-primary btn-sm">{{$u->user->email}}</a> </td>
                        <td>{{$u->trans->amount}}</td>
                        <td>{{$u->trans->t_id}}</td>
                        <td>{{$u->trans->tname->name}}</td>
                        <td style="display: inline-flex">
                            @if($u->ts_id == 1)
                                {{$u->status->name}}
                            @elseif($u->ts_id == 3)
                                <a href="{{route('admin_with_action',['id' => encrypt($u->id),'aid' => encrypt(1)])}}" class="btn btn-success btn-sm" style="margin-right: 10px;"><i class="fa fa-check-circle"></i></a>
                                <a href="{{route('admin_with_action',['id' => encrypt($u->id), 'aid' => encrypt(2)])}}" class="btn btn-danger btn-sm" style="margin-right: 10px;"><i class="fa fa-close"></i></a>
                            @elseif($u->ts_id == 5 || $u->ts_id == 4 || $u->ts_id == 2)
                                {{$u->status->name}}
                            @elseif($u->ts_id == 6)
                                {{$u->status->name}}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection