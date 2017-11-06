<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="title">
            <h1 class="h4">{{Auth::user()->fullname}}</h1>
            <p>World Coin Admin</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="{{Request::is('admin/dashboard') ? "active" : " "}}"> <a href="{{route('admin_dashboard')}}"><i class="fa fa-user"></i>&nbsp;Users</a></li>
        <li class="{{Request::is('admin/admin') ? "active" : " "}}"> <a href="{{route('admin_admin')}}"><i class="fa fa-user-secret"></i>&nbsp;Admin</a></li>
        <li class="{{Request::is('admin/mail') ? "active" : " "}}"> <a href="{{route('mail')}}"><i class="fa fa-envelope-square"></i>&nbsp;Send Mail</a></li>
        <li class="{{Request::is('admin/request') ? "active" : " "}} {{count(\App\AcctReq::where('resolved',0)->get()) > 0 ? 'alert-danger' : ''}}"> <a href="{{route('admin_req')}}"><i class="fa fa-question-circle"></i>&nbsp;Account Request</a></li>
        <li class="{{Request::is('admin/trade') ? "active" : " "}}"> <a href="{{route('admin_trade')}}"><i class="fa fa-money"></i>&nbsp;Tradings</a></li>
        <li class="{{Request::is('admin/transaction') ? "active" : " "}}"> <a href="{{route('admin_trans')}}"><i class="fa fa-credit-card"></i>&nbsp;Transactions</a></li>
        <li class="{{Request::is('admin/withdrawal') ? "active" : " "}}"> <a href="{{route('admin_with')}}"><i class="fa fa-send-o"></i>&nbsp;Withdrawals</a></li>
        <li class="{{Request::is('admin/account') ? "active" : " "}}"> <a href="{{route('admin_account')}}"><i class="fa fa-bank"></i>&nbsp;Account Balance</a></li>
        <li class="{{Request::is('admin/referrals') ? "active" : " "}}"> <a href="{{route('admin_referrals')}}"><i class="fa fa-handshake-o"></i>&nbsp;Referrals</a></li>
        <li class="{{Request::is('admin/school-fees') ? "active" : " "}}"> <a href="{{route('admin_sch_fee')}}"><i class="fa fa-money"></i>&nbsp;School Fees Request</a></li>
        <li class="{{Request::is('admin/btc') ? "active" : " "}}"> <a href="{{route('admin_btc')}}"><i class="fa fa-bitcoin"></i>&nbsp;Bitcoin</a></li>
        <li class="{{Request::is('admin/ticket') ? "active" : " "}}"> <a href="{{route('admin_ticket')}}"><i class="fa fa-ticket"></i>&nbsp;Support Ticket</a></li>
        <li class="{{Request::is('admin/utility') ? "active" : " "}}"> <a href="{{route('admin_utils')}}"><i class="fa fa-dashboard"></i>&nbsp;Utilities</a></li>
    </ul>
</nav>