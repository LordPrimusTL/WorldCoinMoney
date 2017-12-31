<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="title">
            <h1 class="h4">{{Auth::user()->fullname}}</h1>
            <p>World Coin Admin</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <?php
    $userCount = count(\App\User::where('activated',0)->get());
    $arCount = count(\App\AcctReq::where('resolved',0)->get());
    $tradeCount = count(\App\Investments::where('ts_id',3)->get());
    $withCount = count(\App\Withdrawal::where('ts_id',3)->get());
    $payCount = count(\App\SchoolFees::where('resolved',0)->get());
    $ticketCount = count(\App\Ticket::where('res',false)->get());

    ?>
    <ul class="list-unstyled">
        <li class="{{Request::is('admin/dashboard') ? "active" : " "}} {{$userCount > 0 ? 'alert-danger' : ''}}"> <a href="{{route('admin_dashboard')}}"><i class="fa fa-user"></i>&nbsp;Users &nbsp;&nbsp;<span class="badge @if($userCount > 0) badge-danger @else badge-success @endif badge-rounded">{{$userCount}}</span></a></li>
        <li class="{{Request::is('admin/admin') ? "active" : " "}}"> <a href="{{route('admin_admin')}}"><i class="fa fa-user-secret"></i>&nbsp;Admin</a></li>
        <li class="{{Request::is('admin/mail') ? "active" : " "}}"> <a href="{{route('mail')}}"><i class="fa fa-envelope-square"></i>&nbsp;Send Mail</a></li>
        <li class="{{Request::is('admin/request') ? "active" : " "}} {{$arCount > 0 ? 'alert-danger' : ''}}"> <a href="{{route('admin_req')}}"><i class="fa fa-question-circle"></i>&nbsp;Account Request &nbsp;&nbsp;<span class="badge @if($arCount > 0) badge-danger @else badge-success @endif badge-rounded">{{$arCount}}</span></a></li>
        <li class="{{Request::is('admin/trade') ? "active" : " "}} {{$tradeCount > 0 ? 'alert-danger' : ''}}"> <a href="{{route('admin_trade')}}"><i class="fa fa-money"></i>&nbsp;Tradings &nbsp;&nbsp;<span class="badge @if($tradeCount > 0) badge-danger @else badge-success @endif badge-rounded">{{$tradeCount}}</span></a></li>
        <li class="{{Request::is('admin/transaction') ? "active" : " "}}"> <a href="{{route('admin_trans')}}"><i class="fa fa-credit-card"></i>&nbsp;Transactions</a></li>
        <li class="{{Request::is('admin/withdrawal') ? "active" : " "}}{{$withCount > 0 ? 'alert-danger' : ''}}"> <a href="{{route('admin_with')}}"><i class="fa fa-send-o"></i>&nbsp;Withdrawals &nbsp;&nbsp;<span class="badge @if($withCount > 0) badge-danger @else badge-success @endif badge-rounded">{{$withCount}}</span></a></li>
        <li class="{{Request::is('admin/account') ? "active" : " "}}"> <a href="{{route('admin_account')}}"><i class="fa fa-bank"></i>&nbsp;Account Balance</a></li>
        <li class="{{Request::is('admin/referrals') ? "active" : " "}}"> <a href="{{route('admin_referrals')}}"><i class="fa fa-handshake-o"></i>&nbsp;Referrals</a></li>
        <li class="{{Request::is('admin/payment') ? "active" : " "}}{{$payCount > 0 ? 'alert-danger' : ''}}"> <a href="{{route('admin_payment')}}"><i class="fa fa-money"></i>&nbsp;Payment Request &nbsp;&nbsp;<span class="badge @if($payCount > 0) badge-danger @else badge-success @endif badge-rounded">{{$payCount}}</span></a></li>
        <li class="{{Request::is('admin/btc') ? "active" : " "}}"> <a href="{{route('admin_btc')}}"><i class="fa fa-bitcoin"></i>&nbsp;Bitcoin</a></li>
        <li class="{{Request::is('admin/ticket') ? "active" : " "}}{{$ticketCount > 0 ? 'alert-danger' : ''}}"> <a href="{{route('admin_ticket')}}"><i class="fa fa-ticket"></i>&nbsp;Support Ticket &nbsp;&nbsp;<span class="badge @if($ticketCount > 0) badge-danger @else badge-success @endif badge-rounded">{{$ticketCount}}</span></a></li>
        <li class="{{Request::is('admin/testimonials') ? "active" : " "}}"> <a href="{{route('admin_testimonial')}}"><i class="fa fa-tree"></i>&nbsp;Testimonial</a></li>
        <li class="{{Request::is('admin/info') ? "active" : " "}}"> <a href="{{route('admin_info',['id' => null])}}"><i class="fa fa-comment"></i>&nbsp;Message A User</a></li>
        <li class="{{Request::is('admin/utility') ? "active" : " "}}"> <a href="{{route('admin_utils')}}"><i class="fa fa-dashboard"></i>&nbsp;Utilities</a></li>
    </ul>
</nav>