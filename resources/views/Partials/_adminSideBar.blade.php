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
        <li class="{{Request::is('admin/trade') ? "active" : " "}}"> <a href="{{route('admin_trade')}}"><i class="fa fa-money"></i>&nbsp;Tradings</a></li>
        <li class="{{Request::is('admin/transaction') ? "active" : " "}}"> <a href="{{route('admin_trans')}}"><i class="fa fa-credit-card-alt"></i>&nbsp;Transactions</a></li>
        <li class="{{Request::is('admin/account') ? "active" : " "}}"> <a href="{{route('admin_account')}}"><i class="fa fa-bank"></i>&nbsp;Account Balance</a></li>
        <li class="{{Request::is('admin/utility') ? "active" : " "}}"> <a href="{{route('admin_utils')}}"><i class="fa fa-dashboard"></i>&nbsp;Utilities</a></li>
    </ul>
</nav>