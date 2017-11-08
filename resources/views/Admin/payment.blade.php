@extends('adminMaster')
@section('body')
    <div class="container" style="margin-top:30px;  margin-left: 30px;" >
        <div class="row">
            <h2> School Fees Verification</h2><div class="col-12">            @include('Partials._message')
            </div>
            <table class="table table-responsive table-bordered">
                <thead>
                <th>Date</th>
                <th>Payment Type</th>
                <th>Payment For</th>
                <th>Email</th>
                <th>Hash</th>
                <th>POP/Teller</th>
                <th>Resolved</th>
                </thead>
                <tbody>
                <?php $i = 1?>
                @foreach($sf as $u)
                    <tr class="alert alert-@if($u->resolved == 0) success @else warning @endif">
                        <td>{{\Carbon\Carbon::parse($u->created_at)}}</td>
                        <td>{{$u->pay_type == 1 ? 'Bitcoin' : 'Bank Trans.'}}</td>
                        <td>{{$u->for}}</td>
                        <td><a href="{{route('admin_user_view',['id' => encrypt($u->user->id)])}}" class="btn btn-primary btn-sm">{{$u->email}}</a> </td>
                        <td>{{$u->pay_type == 1 ? $u->hash_id : 'N/A'}}</td>
                        <td><a href="{{route('file',['filename' => $u->pay_type == 1 ? $u->pop : $u->teller])}}" ><img src="{{route('file',['filename' => $u->pay_type == 1 ? $u->pop : $u->teller])}}" height="60px" width="60px"/></a></td>
                        <td>@if($u->resolved) Resolved @else
                                <a href="{{route('admin_payment_r',['id' => encrypt($u->id)])}}" class="btn btn-outline-success btn-sm" data-toggle="tooltip" title="Resolve Request" ><i class="fa fa-check"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection