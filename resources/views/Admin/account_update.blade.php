@extends('adminMaster')
@section('body')
    <div class="container" style="margin-top:30px;  margin-left: 30px;" >
        <h2> Account Update</h2>
        <hr/>
        <br/>
        <br/>
        <div class="row">

            <div class="col-lg-4">
                @include('Partials._message')
                <p>Please Fill The Following To Edit The Account Belonging to<strong> <a href="{{route('admin_user_view',['id'=>encrypt($Main->user_id)])}}">{{$Main->user->fullname}}</a> </strong></p>
                <form method="POST" action="{{route('admin_acc_up_post',['id' => encrypt($Main->id)])}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <select class="form-control" id="acc_type" name="acct_type">
                            <option value="">Select Account Type</option>
                            <option value="1">Trading Account</option>
                            <option value="2">Referral Account</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" required class="form-control" name="amount" id="amount" placeholder="Amount"/>
                        <br/>
                        <p>Please Note That The Amount Supplied Will Be Added to The present Value Either Negative or Positive;</p>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <p>Please Enter Password To Effect Change</p>
                        <input type="password" required class="form-control" name="password" id="password" placeholder="Password"/>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-save"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection