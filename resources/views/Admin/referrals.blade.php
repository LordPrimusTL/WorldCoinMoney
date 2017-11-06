@extends('adminMaster')
@section('body')
    <div class="container" style="margin-top:30px;  margin-left: 30px;" >
        <div class="row">
            <h2>Referrals</h2>
            @include('Partials._message')
            <table class="table table-responsive table-bordered">
                <thead>
                <th>S/N</th>
                <th>Date</th>
                <th>Referred</th>
                <th>Referrer</th>
                </thead>
                <tbody>
                <?php $i = 1;?>
                @foreach($ref as $u)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{\Carbon\Carbon::parse($u->created_at)}}</td>
                        <td><a href="{{route('admin_user_view',['id' => encrypt($u->referred)])}}" class="btn btn-primary btn-sm">{{\App\User::find($u->referred)->email}}</a> </td>
                        <td><a href="{{route('admin_user_view',['id' => encrypt($u->referrer)])}}" class="btn btn-primary btn-sm">{{$u->user->email}}</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection