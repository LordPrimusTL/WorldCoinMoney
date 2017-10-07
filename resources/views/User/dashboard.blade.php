@extends('master')
@section('body')
    <div class="container" style="margin-top:30px;">
        <div class="row">
            @include('Partials._message')
            <div class="col-lg-4">
                <a href="{{route('user_profile')}}" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:green;">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">PERSONAL DETAILS</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-user" style="font-size:30px"></i></h3>
                            <p class="well-sm text-center">
                                View/Update Your Personal Details
                            </p>
                        </div>
                        <div class="panel-footer" style="background-color:green;color:white;">
                            <P class="well-sm text-center">VIEW DETAILS</P>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('user_account')}}" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:green;">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">Accounts</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-bank" style="font-size:30px;"></i></h3>
                            <p class="well-sm text-center">
                                View Your Personal Accounts
                            </p>
                        </div>
                        <div class="panel-footer" style="background-color:green;color:white;">
                            <P class="well-sm text-center">VIEW DETAILS</P>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('user_invest')}}" style="text-decoration:none;color:white;">
                    <div class="panel" style="{{\Illuminate\Support\Facades\Auth::user()->reg_type == 1 ? 'background-color:darkred;' : 'background-color:green;'}} ">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">TRADE NOW</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-money" style="font-size:30px"></i></h3>
                            <p class="well-sm text-center">
                                Trade And Get a % Increase Every Month
                            </p>
                        </div>
                        <div class="panel-footer" style="{{\Illuminate\Support\Facades\Auth::user()->reg_type == 1 ? 'background-color:darkred;' : 'background-color:green;'}}color:white;">
                            <P class="well-sm text-center">Invest Now <i class="fa fa-arrow-circle-o-right"></i></P>
                        </div>

                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="{{route('user_withdrawals')}}" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:green;">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">WITHDRAWALS</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-money" style="font-size:30px"></i></h3>
                            <p class="well-sm text-center">
                                Check/Apply For Withdrawals
                            </p>
                        </div>
                        <div class="panel-footer" style="background-color:green;color:white;">
                            <P class="well-sm text-center">View Details</P>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('user_transaction')}}" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:green;">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">TRANSACTIONS</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-calendar" style="font-size:30px;"></i></h3>
                            <p class="well-sm text-center">
                                View Details of Your Transactions
                            </p>
                        </div>
                        <div class="panel-footer" style="background-color:green;color:white;">
                            <P class="well-sm text-center">TRANSACTION DETAILS</P>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{route('user_referrals')}}" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:green;">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">REFFERALS</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-users" style="font-size:30px"></i></h3>
                            <p class="well-sm text-center">
                                View Your Referrals
                            </p>
                        </div>
                        <div class="panel-footer" style="background-color:green;color:white;">
                            <P class="well-sm text-center">VIEW REFFERALS</P>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href={{route('user_support')}}Referrals.html" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:green;">
                        <div class="panel-heading">
                            <p class="panel-success panel-title text-center">SUPPORT TICKET</p>
                        </div>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-users" style="font-size:30px"></i></h3>
                            <p class="well-sm text-center">
                                Raise A Ticket
                            </p>
                        </div>
                        <div class="panel-footer" style="background-color:green;color:white;">
                            <P class="well-sm text-center">VIEW TICKETS</P>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection