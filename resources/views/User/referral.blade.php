@extends('master')
@section('body')
    @if($ref != null)
        <div class="row" style="margin-bottom: 300px;">
            <div class="container">
                <h4 class="container-fluid text-center" style="margin-top:5px;margin-bottom:10px;font-size:29px;color:greenyellow">{{$title}}</h4>
                <br/>
                <table class="table table-responsive table-bordered">
                    <thead>
                    <th>S/N</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($ref as $in)
                        <?php $r = app\User::find($in->referred)?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{\Carbon\Carbon::parse($in->created_at)}}</td>
                            <td>{{$r->fullname}}</td>
                            <td>{{$r->email}}</td>
                            <td><a href="{{route('user_referrals_id',['id' => encrypt($r->id)])}}" class="btn btn-success"> <i class="fa fa-eye"></i> View Referrals </a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="jumbotron text-center">
            <p>No Investment Yet</p>
        </div>
    @endif
@endsection