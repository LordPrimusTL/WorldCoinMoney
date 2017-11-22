@extends('master')
@section('body')
    <div class="container-fluid jumbotron" style="background-color: white;">
        <p class="well-sm lead">
        <div class="row">
            <div class="col-lg-3">

            </div>
        </div>
    </div>
    <!--// brief information about us ends here-->

    <div class="container" style="margin-top:30px;">
        <h4 class="container-fluid text-center" style="margin-top:5px;margin-bottom:10px;font-size:29px;color:greenyellow">WITHDRAWALS</h4>
        <hr/>
        @include('Partials._message')
        <h4>Withdraw From Transactions: </h4>

        <table class="table table-responsive table-bordered">
            <thead>
            <th>S/N</th>
            <th>Date</th>
            <th>ID</th>
            <th>AMOUNT(CTM)</th>
            <th>Description</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php $i = 1?>
            @foreach($inv as $in)
                @if($in->withd == null)
                    <tr class="
                                @if($in->ts_id == 1|| $in->ts_id == 7)
                                    alert-success
                                @elseif($in->ts_id == 3 || $in->ts_id == 6)
                                     alert-warning
                                @elseif($in->ts_id == 5 || $in->ts_id == 4 || $in->ts_id == 2)
                                      alert-danger
                                @endif">
                        <td>{{$i++}}</td>
                        <td>{{\Carbon\Carbon::parse($in->created_at)}}</td>
                        <td>{{$in->t_id}}</td>
                        <td>{{$in->amount}}</td>
                        <td>{{$in->descn}}</td>
                        <td><a href="{{route('user_with_trans',['id' => encrypt($in->id)])}}" class="btn btn-success btn-sm"><i class="fa fa-pull-right"></i> Withdraw Funds</a></td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>



    @if($with != null)
        <div class="row" style="margin-bottom: 300px;">
            <div class="container">
                <hr/>
                <h4 class="container-fluid text-center" style="margin-top:15px;margin-bottom:10px;font-size:29px;color:greenyellow">WITHDRAWAL HISTORY</h4>
                <hr/>
                <br/>
                <table class="table table-responsive table-bordered text-center">
                    <thead>
                    <th>S/N</th>
                    <th>Date</th>
                    <th>Withdrawal ID</th>
                    <th>Transaction ID</th>
                    <th>Description</th>
                    <th>AMOUNT(CTM)</th>
                    <th>STATUS</th>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($with as $in)
                        <tr class="
                                @if($in->ts_id == 1|| $in->ts_id == 7)
                                alert-success
                                @elseif($in->ts_id == 3 || $in->ts_id == 6)
                                alert-warning
                                @elseif($in->ts_id == 5 || $in->ts_id == 4 || $in->ts_id == 2)
                                alert-danger
                                @endif">
                            <td>{{$i++}}</td>
                            <td>{{\Carbon\Carbon::parse($in->created_at)}}</td>
                            <td>{{$in->w_id}}</td>
                            <td>{{$in->trans->t_id}}</td>
                            <td>{{$in->trans->tname->name}}</td>
                            <td>{{$in->trans->amount}}</td>
                            <td>{{$in->status->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="jumbotron text-center">
            <p>No Withdrawals Yet</p>
        </div>
    @endif
@endsection