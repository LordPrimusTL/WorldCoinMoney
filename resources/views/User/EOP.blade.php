@extends('master')
@section('body')
    <div class="container " style="margin-top:150px;margin-bottom:100px;">
        <div class="col-lg-12">
            @include('Partials._message')
        </div>
        <div class="col-md-offset-2 col-md-7 ">
            @if($t == 1)
                <form action="{{route('user_EOPP',['token' => encrypt(1)])}}" method="post" style="margin-left:50px;" id="Regform" enctype="multipart/form-data">
                    <h4 style="margin-top:5px;text-align:center; margin-bottom:10px;font-size:29px;">BITCOIN PAYMENT</h4>
                    {{csrf_field()}}
                    <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-money">
						</span>
					</span>
                        <input type="text" disabled class="form-control input input-lg" placeholder="Payment For" value="Trading Fees"/>
                    </div>
                    <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-envelope">
						</span>
					</span>
                        <input type="email" name="email" id="email" class="form-control input input-lg" placeholder="Email Address"/>
                    </div>
                    <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-bitcoin">
						</span>
					</span>
                        <input type="text" name="hash" id="hash" class="form-control input input-lg" placeholder="Hash ID"/>
                    </div>
                    <label for="pop">Upload POP: </label>
                    <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-upload">
						</span>
					</span>
                        <input type="file" name="pop" id="pop" class="form-control input input-lg" placeholder="Upload POP" accept="image/jpeg"/>
                    </div>
                    <div class="form-group  col-md-12 input-group">
                        <input type="submit" class="btn btn-block btn-lg" value="Submit"/>
                    </div>
                </form>
            @elseif($t == 2)
                <form action="{{route('user_EOPP',['token' => encrypt(2)])}}" method="post" style="margin-left:50px;" id="Regform" enctype="multipart/form-data">
                    <h4 style="margin-top:5px;text-align:center; margin-bottom:10px;font-size:29px;">BANK TRANSACTION</h4>
                    {{csrf_field()}}
                    <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-money">
						</span>
					</span>
                        <input type="text" disabled class="form-control input input-lg" placeholder="Payment For" value="Trading Fees"/>
                    </div>
                    <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-envelope">
						</span>
					</span>
                        <input type="email" name="email" id="email" class="form-control input input-lg" placeholder="Email Address">
                    </div>
                    <label for="teller">Upload Teller/Bank Transaction Alert: </label>
                    <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-pencil">
						</span>
					</span>
                        <input type="file" name="teller" id="teller" class="form-control input input-lg" placeholder="Teller">
                    </div>
                    <div class="form-group  col-md-12 input-group">
                        <input type="submit" class="btn btn-block btn-lg" value="Submit"/>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection