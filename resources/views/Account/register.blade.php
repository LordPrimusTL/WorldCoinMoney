@extends('master')
@section('body')
    <div class="container " style="margin-top:50px;margin-bottom:100px;">
        <div class="col-md-offset-2 col-md-7 ">
            @include('Partials._message')
            <form action="{{route('register_post')}}" method="post" style="margin-left:50px;" id="Regform" >
                {{csrf_field()}}
                <h4 style="margin-bottom:10px;font-size:29px;">Profile Information</h4>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user">
						</span>
					</span>
                    <input type="text" name="fullname" type="fullname" required class="form-control input input-lg" placeholder="Full Name">
                </div>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="fa fa-address-card">
						</span>
					</span>
                    <select id="reg_type" required name="reg_type" class="form-control input input-lg ">
                        <?php $s = \App\RegistrationType::all()?>
                        <option value="">Select Registration Type: </option>
                            @foreach( $s as $a)
                                <option value="{{$a->id}}">{{$a->name}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="fa fa-user-plus">
						</span>
					</span>
                    <input type="text" name="referrer" id="referrer" value="@if($r_link != null) {{$r_link}} @endif" class="form-control input input-lg" placeholder="Referrer">
                </div>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="fa fa-money">
						</span>
					</span>
                    <select id="pay_type" required name="pay_type" class="form-control input input-lg ">
                        <?php $s = \App\PaymentType::all();?>
                        <option value="">Select Payment Type: </option>
                        @foreach( $s as $a)
                            <option value="{{$a->id}}">{{$a->name}}</option>
                        @endforeach
                    </select>
                </div>
                <br/><br/><br/>
                <h4 style="margin-top:5px;margin-bottom:10px;font-size:29px;">Login Information</h4>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-envelope">
						</span>
					</span>
                    <input type="email" name="email" id="email" required class="form-control input input-lg" placeholder="Email">
                </div>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-pencil">
						</span>
					</span>
                    <input type="password" name="password" id="password" required class="form-control input input-lg" placeholder="Password">
                </div>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-pencil">
						</span>
					</span>
                    <input type="password" name="confirm_password" id="confirm_password" required class="form-control input input-lg" placeholder="Confirm Password">
                </div>
                <div class="form-group  col-md-12 input-group">
                    <input type="submit" class="btn btn-block btn-lg"value="Submit"/>
                </div>
            </form>
            <div class="col-md-offset-3 acct"  >
                <a href="{{route('login')}}"><h5 >Already have an Account? <b style="color:green">Click HERE</b></h5></a>
            </div>

        </div>
    </div>
@endsection