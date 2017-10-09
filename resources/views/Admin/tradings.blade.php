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
                    <p>Search Here...</p>
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
                            <th>ID</th>
                            <th>User</th>
                            <th>AMT</th>
                            <th>DUR.(M)</th>
                            <th>Rate(%)</th>
                            <th>Start-Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        @foreach($trades as $trade)
                            <tr class="
                                @if($trade->ts_id == 1|| $trade->ts_id == 7)
                                    alert-success
                                @elseif($trade->ts_id == 3 || $trade->ts_id == 6)
                                    alert-warning
                                @elseif($trade->ts_id == 5 || $trade->ts_id == 4 || $trade->ts_id == 2)
                                    alert-danger
                                @endif">
                                <td>{{$i++}}</td>
                                <td>{{\Carbon\Carbon::parse($trade->created_at)->toDateString()}}</td>
                                <td>{{$trade->inv_id}}</td>
                                <td><a href="{{route('admin_user_view',['id' => $trade->user_id * 8009 * 8009])}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i> {{explode(" ", $trade->User->fullname)[0]}}</a> </td>
                                <td>{{$trade->amount}}</td>
                                <td>{{$trade->duration}}</td>
                                <td>{{$trade->irate}}</td>
                                <td>{{ $trade->start_date == null ? 'N/A' : \Carbon\Carbon::parse($trade->start_date)}}</td>
                                <td>
                                    @if($trade->ts_id == 7)
                                        N/A
                                    @elseif($trade->ts_id == 3)
                                        <a href="{{route('admin_trade_action',['id' => encrypt($trade->inv_id),'aid' => encrypt(1)])}}" class="btn btn-success"><i class="fa fa-check-circle"></i></a>
                                        <a href="{{route('admin_trade_action',['id' => encrypt($trade->inv_id), 'aid' => encrypt(2)])}}" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                    @elseif($trade->ts_id == 5 || $trade->ts_id == 4 || $trade->ts_id == 2)
                                        {{$trade->status->name}}
                                    @elseif($trade->ts_id == 6)
                                        {{$trade->status->name}}
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