@extends('adminMaster')
@section('body')
    <div class="container" style="margin-top:30px;  margin-left: 30px;" >
        <div class="row">
            <h2>Accounts</h2>
            @include('Partials._message')
            {{$t}}
            <table class="table table-responsive table-bordered">
                <thead>
                <th>Date</th>
                <th>User</th>
                <th>Trading Bal.</th>
                <th>Referral Bal.</th>
                <th>Updated Last</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($main as $u)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($u->created_at)}}</td>
                        <td><a href="{{route('admin_user_view',['id' => encrypt($u->user_id)])}}" class="btn btn-primary btn-sm">{{$u->user->email}}</a> </td>
                        <td>{{$u->trade_bal}}</td>
                        <td>{{$u->ref_bal}}</td>
                        <td>{{\Carbon\Carbon::parse($u->updated_at)}}</td>
                        <td><a href="{{route('admin_acc_up',['id' => encrypt($u->id)])}}" class="btn btn-success btn-sm"><i class="fa fa-file-text"></i> Update Account</a> </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection