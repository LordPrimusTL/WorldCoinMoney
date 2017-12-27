@extends('adminMaster')
@section('body')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>


            <div class="row">
                <div class="col-lg-12" style="margin-left: 10px;">
                    <h2>Users</h2>
                    <br/>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <form action="{{route('searchUser')}}" method="post" class="form-inline">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" required style="margin-right: 5px;" class="form-control" name="key" id="key" placeholder="Search User Here..." value="{{ isset($key) ? $key : ""}}"/>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            <a href="{{route('admin_dashboard')}}" class="btn btn-link">All Users</a>
                        </div>
                    </form>
                </div>
            </div>
            <br/>
            <br/>

            <div class="col-lg-12 col-md-12 col-sm-4">
                @include('Partials._message')
                <div class=" table table-responsive">
                    <table id="table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        @foreach($users as $user)
                            @if($user->role_id == 3)
                                <tr class="alert alert-{{$user->activated == false ? 'danger' : 'info'}}">
                                    <td>{{$i++}}</td>
                                    <td>{{$user->fullname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td style="display: inline-flex;">
                                        <a href="{{route('admin_user_view',['id' => encrypt($user->id)])}}" class="btn btn-outline-info btn-sm" style="margin-right: 10px;"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('admin_info',['id' => encrypt($user->id)])}}" class="btn btn-outline-success btn-sm" style="margin-right: 10px;"><i class="fa fa-comment"></i></a>
                                        <a href="{{route('mail.single',['id' => encrypt($user->email)])}}" class="btn btn-outline-primary btn-sm" style="margin-right: 10px;"><i class="fa fa-envelope-square"></i></a>
                                        <a href="{{route('deleteUser',['id' => encrypt($user->id)])}}" onclick="return confirm('Are you sure you want to delete this User?');" class="btn btn-outline-danger btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="myCenter">
                    {{$s == null ? ' ' : $users->links()}}
                </div>
            </div>
        </header>
    </div>
@endsection