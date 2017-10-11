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
                    <h2> Request History</h2>
                <!--<form class="form-" method="POST" action="">
                        {{csrf_field()}}
                        <div class="col-lg-3">
                            <div class="form-group-sm ">
                                <select class="form-control input-group-sm" name="filt" id="filt">
                                    <option value="0">ID</option>
                                    <option value="1">Name</option>
                                    <option value="2">Email</option>
                                    <option value="3">Country</option>
                                    <option value="4">State</option>
                                    <option value="5">City</option>
                                    <option value="6">Level ID(Numbers)</option>
                                    <option value="7">Active(1 or 0)</option>
                                </select>

                                <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                <a href="" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All User</a>
                                <button style="margin-top: 5px;" class="btn btn-outline-primary btn-sm pull-right"  type="submit"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </form>-->
                    <br/>
                    <br/>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-4">
                @include('Partials._message')
                <div class=" table table-responsive">
                    <table id="table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>User</th>
                            <th>Old Account</th>
                            <th>New Account</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        @foreach($req as $r)
                            <tr class="alert
                                @if($r->resolved == 1)
                                    alert-success
                                @else
                                    alert-danger
                                @endif">
                                <td>{{$i++}}</td>
                                <td>{{\Carbon\Carbon::parse($r->created_at)->toDateString()}}</td>
                                <td><a href="{{route('admin_user_view',['id' => encrypt($r->user_id)])}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i> {{$r->user->email}}</a> </td>
                                <td>{{\App\AcctType::find($r->old_acct_type)->name}}</td>
                                <td>{{\App\AcctType::find($r->new_acct_type)->name}}</td>
                                <td>
                                    @if($r->resolved == 1)
                                        Resolved
                                    @else
                                        <a href="{{route('admin_req_post',['id'=> encrypt($r->id)])}}" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </header>
    </div>
@endsection