@extends('master')
@section('body')
    <div class="container " style="margin-top:50px;margin-bottom:100px;">
        <div class="col-md-offset-2 col-md-7 ">
            @include('Partials._message')
            <form action="{{route('user_profile_post')}}" method="post" style="margin-left:50px;" id="Regform" >
                {{csrf_field()}}
                <h4 style="margin-bottom:10px;font-size:29px;" class="text-center text-green">Profile Information</h4>
                <label for="fullname">Full Name:</label>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user">
						</span>
					</span>
                    <input type="text" name="fullname" id="fullname"  required class="form-control input input-lg" value="{{$user->fullname}}" placeholder="Full Name">
                </div>

                <label for="reg_type">Account Type:</label>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="fa fa-address-card">
						</span>
					</span>
                    <select id="reg_type" disabled required name="reg_type" class="form-control input input-lg sell">
                        <?php $s = \App\RegistrationType::all()?>
                        @foreach( $s as $a)7
                            @if($user->reg_type == $a->id)
                                <option selected value="{{$a->id}}">{{$a->name}}</option>
                            @else
                                <option value="{{$a->id}}">{{$a->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <label for="acc_id">Account Type:</label>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="fa fa-id-badge">
						</span>
					</span>
                    <select disabled id="acc_id" required name="acc_id" class="form-control input input-lg ">
                        <?php $s = \App\AcctType::all()?>
                        @foreach( $s as $a)
                            @if($user->acc_id == $a->id)
                                <option selected value="{{$a->id}}">{{$a->name}}</option>
                            @else
                                <option value="{{$a->id}}">{{$a->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <label for="referrer">Reeferrer:</label>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="fa fa-user-plus">
						</span>
					</span>
                    <input type="text" name="referrer" disabled id="referrer" value="@if($user->r_link != null) {{$user->r_link}} @endif" class="form-control input input-lg" placeholder="Referrer">
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
                            @if($user->payment_id == $a->id)
                                <option selected value="{{$a->id}}">{{$a->name}}</option>
                            @else
                                <option value="{{$a->id}}">{{$a->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group  col-md-12 input-group">
                    <input type="submit" class="btn btn-block btn-lg"value="Update"/>
                </div>
                <br/><br/><br/>
            </form>


            <form action="{{route('user_acct_upgrade')}}" method="post" style="margin-left:50px;" id="Regform" >
                {{csrf_field()}}
                <h4 style="margin-bottom:10px;font-size:29px;" class="text-center text-green">Account Upgrade</h4>
                <label for="reg_type">Old Account Type:</label>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="fa fa-address-card">
						</span>
					</span>
                    <select disabled id="reg_type" required name="reg_type" class="form-control input input-lg ">
                        <?php $s = \App\RegistrationType::all()?>
                        @foreach( $s as $a)
                            @if($user->reg_type == $a->id)
                                <option selected value="{{$a->id}}">{{$a->name}}</option>
                            @else
                                <option value="{{$a->id}}">{{$a->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <label for="reg_type">New Account Type:</label>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="fa fa-address-card">
						</span>
					</span>
                    <select  id="new_reg_type" required name="new_reg_type" class="form-control input input-lg ">
                        <?php $s = \App\RegistrationType::all()?>
                        @foreach( $s as $a)
                            @if($user->reg_type == $a->id)
                            @else
                                <option value="{{$a->id}}">{{$a->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group  col-md-12 input-group">
                    <input type="submit" class="btn btn-block btn-lg"value="Update"/>
                </div>
                <br/><br/><br/>
            </form>





            <form action="{{route('user_password_edit')}}" method="post" style="margin-left:50px;" id="Regform" >
                {{csrf_field()}}
                <h4 style="margin-top:5px;margin-bottom:10px;font-size:29px;">Login Information</h4>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-envelope">
						</span>
					</span>
                    <input type="email" value="{{$user->email}}" disabled name="email" id="email" required class="form-control input input-lg" placeholder="Email">
                </div>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-pencil">
						</span>
					</span>
                    <input type="password" name="password" id="password" required class="form-control input input-lg" placeholder="Old Password">
                </div>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-pencil">
						</span>
					</span>
                    <input type="password" name="new_password" id="confirm_password" required class="form-control input input-lg" placeholder="New Password">
                </div>
                <div class="input-group form-group col-md-12">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-pencil">
						</span>
					</span>
                    <input type="password" name="new_confirm_password" id="new_confirm_password" required class="form-control input input-lg" placeholder="Confirm New Password">
                </div>
                <div class="form-group  col-md-12 input-group">
                    <input type="submit" class="btn btn-block btn-lg"value="Update"/>
                </div>
                <br/><br/><br/>
            </form>
        </div>
    </div>
@endsection