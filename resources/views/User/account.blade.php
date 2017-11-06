@extends('master')
@section('body')
    <div class="container " style="margin-top:50px;margin-bottom:100px;">
        <div class="col-md-offset-2 col-md-7 ">
            @include('Partials._message')
            <table class="table table-responsive table-striped table-success">
                <thead>
                <th>S/N</th>
                <th>Trade Account(WCM)</th>
                <th>Referral Account(WCM)</th>
                <th>Updated</th>
                </thead>
                <tbody>
                <tr class="success">
                    <td>1</td>
                    <td>{{$a->trade_bal}}</td>
                    <td>{{$a->ref_bal}}</td>
                    <td>{{\Carbon\Carbon::parse($a->updated_at)}}</td>
                </tr>
                </tbody>
            </table>
<hr/>
            <h4 style="margin-bottom:10px;font-size:29px;" class="text-center text-green">Update Account Details</h4>
            <form method="POST" action="{{route('user_acct_post')}}" id="Regform">
                {{csrf_field()}}
                <label for="reg_type">Bank Name:</label>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="fa fa-bank">
						</span>
					</span>
                    <input class="form-control input input-lg" name="bank" id="bank" placeholder="Bank Name" value="{{$acct != null ? $acct->bank : ''}}">
                </div>
                <label for="reg_type">Account Name:</label>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="fa fa-user">
						</span>
					</span>
                    <input class="form-control input input-lg" name="name" id="name" placeholder="Account Name" value="{{$acct != null ? $acct->name : ''}}">
                </div>
                <label for="reg_type">Account Number:</label>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="fa fa-sort-numeric-asc">
						</span>
					</span>
                    <input class="form-control input input-lg" name="number" id="number" placeholder="Account Number" value = "{{$acct != null ? $acct->number : ''}}">
                </div>

                <div class="form-group  col-md-12 input-group">
                    <input type="submit" class="btn btn-block btn-lg"value="Update"/>
                </div>
            </form>
        </div>
    </div>
@endsection