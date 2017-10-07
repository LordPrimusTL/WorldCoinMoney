@extends('adminMaster')
@section('body')
    <div class="container" style="margin-top:30px;  margin-left: 30px;" >
        <div class="row">
            <h2> Transaction</h2>
            @include('Partials._message')
            <table class="table table-responsive table-bordered">
                <thead>
                <th>Date</th>
                <th>User</th>
                <th>Trading Bal.</th>
                <th>Referral Bal.</th>

                <th>Action</th>
                </thead>
                <tbody>
                @foreach($main as $u)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($u->created_at)}}</td>
                        <td><a href="{{route('admin_user_view',['id' => encrypt($u->user_id)])}}" class="btn btn-primary btn-sm">{{$u->user->email}}</a> </td>
                        <td>{{$u->trade_bal}}</td>
                        <td>{{$u->ref_bal}}</td>
                        <td><a href="" </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection