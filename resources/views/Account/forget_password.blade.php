@extends('master')
@section('body')
    <div class="container " style="margin-top:150px;margin-bottom:100px;">
        @if($t == 1)
            <div class="col-md-offset-2 col-md-7 ">
                <form action="{{route('forgot_password_post')}}" method="post" style="margin-left:50px;" id="Regform" >
                    <h4 style="margin-top:5px;text-align:center; margin-bottom:10px;font-size:29px;">Forgot Password? </h4>
                    @include('Partials._message')
                    {{csrf_field()}}
                    <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-envelope">
						</span>
					</span>
                        <input type="email" name="email" id="email" class="form-control input input-lg" placeholder="Email Address">
                    </div>
                    <div class="form-group  col-md-12 input-group">
                        <input type="submit" class="btn btn-block btn-lg" value="Submit"/>
                    </div>
                </form>
            </div>
        @endif
        @if($t == 2)
            <div class="col-md-offset-2 col-md-7 ">
                <form action="{{route('change_password',['token' => $token])}}" method="post" style="margin-left:50px;" id="Regform" >
                    <h4 class="alert alert-success" style="margin-top:5px;text-align:center; margin-bottom:10px;font-size:29px;"> Reset Password </h4>
                    <hr/>
                    <p>Kindly Fill in The Below Details To Change Your Password.</p>
                    <hr/>
                    @include('Partials._message')
                    {{csrf_field()}}
                    <div class="input-group form-group col-md-12">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-envelope">
                            </span>
                        </span>
                        <input type="email" name="email" id="email" class="form-control input input-lg" placeholder="Email Address">
                    </div>
                    <div class="input-group form-group col-md-12">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-pencil">
                            </span>
                        </span>
                        <input type="password" name="new_password" id="new_password" class="form-control input input-lg" placeholder="New Password">
                    </div>
                    <div class="input-group form-group col-md-12">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-pencil">
                            </span>
                        </span>
                        <input type="password" name="conf_new_password" id=conf_new_password" class="form-control input input-lg" placeholder="Confirm Password">
                    </div>
                    <div class="form-group  col-md-12 input-group">
                        <input type="submit" class="btn btn-block btn-lg" value="Submit"/>
                    </div>
                </form>
            </div>
        @endif
            @if($t == 3)
            <div class="col-md-offset-2 col-md-7 ">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Reset Password
                    </div>
                    <div class="panel-body">
                        @include('Partials._message')
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection