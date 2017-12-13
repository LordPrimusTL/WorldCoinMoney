@extends('master')
@section('body')
    <div class="container" style="margin-top:30px;">
        <div class="row">
            @include('Partials._message')
            <div class="col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('user_profile')}}" style="text-decoration:none;color:white;">
                    @php($s = $user->class_id)
                    <div class="panel @if($s == 0) green @elseif($s==1) bronze @elseif($s==2) silver @elseif($s==3) gold @elseif($s==4) ruby @elseif($s==5) platinum @endif">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">PERSONAL DETAILS</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-user" style="font-size:30px"></i></h3>
                            <p class="text-center">Class: {{$s==0?'N/A':\App\TClass::find($s)->name}}</p>
                            <p class="well-sm text-center">
                                View/Update Your Personal Details
                            </p>
                        </div>
                        <div class="panel-footer @if($s == 0) green @elseif($s==1) bronze @elseif($s==2) silver @elseif($s==3) gold @elseif($s==4) ruby @elseif($s==5) platinum @endif">
                            <P class="well-sm text-center">VIEW DETAILS <i class="fa fa-arrow-circle-o-right"></i></P>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('user_account')}}" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:green;">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">Accounts</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-bank" style="font-size:30px;"></i></h3>
                            <br/>
                            <p class="well-sm text-center">
                                View Your Personal Accounts
                            </p>

                        </div>
                        <div class="panel-footer" style="background-color:green;color:white;">
                            <P class="well-sm text-center">View Details <i class="fa fa-arrow-circle-o-right"></i></P>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('user_invest')}}" style="text-decoration:none;color:white;">
                    <div class="panel" style="{{\Illuminate\Support\Facades\Auth::user()->reg_type == 1 ? 'background-color:darkred;' : 'background-color:green;'}} ">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">TRADE NOW</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-money fa-2x"></i></h3>
                            <p class="well-sm text-center">
                                Trade And Get a % Increase Every Month
                            </p>
                        </div>
                        <br/>
                        <div class="panel-footer" style="{{\Illuminate\Support\Facades\Auth::user()->reg_type == 1 ? 'background-color:darkred;' : 'background-color:green;'}}color:white;">
                            <P class="well-sm text-center">Invest Now <i class="fa fa-arrow-circle-o-right"></i></P>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('user_withdrawals')}}" style="text-decoration:none;color:white;">
                    <?php $u = \App\Utility::find(1);?>
                    <div class="panel" style="{{$u->value == 1 ? 'background-color:green;' : 'background-color:darkred;'}}">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">WITHDRAWALS</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-money" style="font-size:30px"></i></h3>
                            <br/>
                            <p class="well-sm text-center">
                                Check/Apply For Withdrawals
                            </p>
                        </div>
                        <div class="panel-footer" style="{{$u->value == 1 ? 'background-color:green;' : 'background-color:darkred;'}}">
                            <P class="well-sm text-center">View Details <i class="fa fa-arrow-circle-o-right"></i></P>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('user_transaction')}}" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:green;">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">TRANSACTIONS</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-calendar" style="font-size:30px;"></i></h3>
                            <br/>
                            <p class="well-sm text-center">
                                View Details of Your Transactions
                            </p>
                        </div>
                        <div class="panel-footer" style="background-color:green;color:white;">
                            <P class="well-sm text-center">View Details <i class="fa fa-arrow-circle-o-right"></i></P>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4" id="col-hack">
                <a href="{{route('user_referrals')}}" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:green;">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">REFERRALS</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-users" style="font-size:30px"></i></h3>
                            <br/>
                            <p class="well-sm text-center">
                                View Your Referrals
                            </p>
                        </div>
                        <div class="panel-footer" style="background-color:green;color:white;">
                            <P class="well-sm text-center">View Referrals <i class="fa fa-arrow-circle-o-right"></i></P>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('user_tickets')}}" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:green;">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">SUPPORT TICKET</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-users" style="font-size:30px"></i></h3>
                            <br/>
                            <p class="well-sm text-center">
                                Raise A Ticket
                            </p>
                        </div>
                        <div class="panel-footer" style="background-color:green;color:white;">
                            <P class="well-sm text-center">View Tickets <i class="fa fa-arrow-circle-o-right"></i></P>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
@endsection