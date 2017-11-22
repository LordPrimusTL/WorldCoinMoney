@extends('master')
@section('body')
    <div class="container-fluid jumbotron" style="background-color: white;">
        <p class="well-sm lead">
        <h4 class="container-fluid text-center" style="margin-top:5px;margin-bottom:10px;font-size:29px;color:greenyellow">TRADING</h4>
        <p class="well-sm container">
            <b style="color:green;">NOTE:</b>
            Trading Amount starts from CTM10,000.
            Please note that you wont be able to withdraw your profit until the end of the Duration. Although you will be able to withdraw
            your referral bonuses.
        </p>
    </div>
    <!--// brief information about us ends here-->
    <div class="container-fluid" style="margin-top:60px;">
        <form action="{{route('user_invest_post')}}" method="post" id="Regform">
            {{csrf_field()}}
            <div class="col-md-offset-2 col-md-8">
                @include('Partials._message')
                <div class="row">
                    <div class="col-md-12">
                        <label for="pay_type">Mode of Payment: </label>
                        <div class="input-group form-group col-md-12">
                            <select class="form-control input input-lg" name="pay_type" id="pay_type">
                                <option value="">Choose a mode of payment</option>
                                @php($ss = \App\PaymentType::all())
                                @foreach($ss as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="duration">Duration of Trading(Months): </label>
                        <div class="input-group form-group col-md-12">
                            <input type="number" min="1"  name="duration" id="duration" required class="form-control input input-lg"  placeholder="Duration Of Trading(Month)"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="amount">Amount: </label>
                        <div class="input-group form-group col-md-12">
                            <input type="number" min="10000" name="amount" id="amount" required class="form-control input input-lg"  placeholder="Amount"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p><i>By Clicking The Trade Button, You Agree to Our Terms And Condition</i></p>
                        <br/>
                        <div class="form-group  col-md-12 input-group">
                            <input type="submit" class="btn btn-block btn-lg" style="background-color: green; color: white;" value="Trade"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



    @if($inv != null)

        <div class="row" style="margin-bottom: 300px;">
            <div class="container">
                <h4 class="container-fluid text-center" style="margin-top:5px;margin-bottom:10px;font-size:29px;color:greenyellow">TRADING HISTORY</h4>
                <br/>
                <table class="table table-responsive table-bordered">
                    <thead>
                    <th>S/N</th>
                    <th>Date</th>
                    <th>ID</th>
                    <th>AMT</th>
                    <th>DUR.(M)</th>
                    <th>Rate(%)</th>
                    <th>Start-Date</th>
                    <th>STATUS</th>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($inv as $in)
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
                            <td>{{$in->inv_id}}</td>
                            <td>{{$in->amount}}</td>
                            <td>{{$in->duration}}</td>
                            <td>{{$in->irate}}</td>
                            <td>{{$in->start_date == null ? 'N/A' : \Carbon\Carbon::parse($in->start_date)}}</td>
                            <td>{{$in->status->name}}</td>
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