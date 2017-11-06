@extends('adminMaster')
@section('body')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>
            <div class="col-lg-8">
                &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large"> <i class=" fa fa-bitcoin"></i> Bitcoin</p>
            </div>
            <br/>
            <br/>
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-4" style="margin-left: 3px;">
                    @include('Partials._message')
                    @if(count($btc) > 0)
                        <div class=" table table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1?>
                                @foreach($btc as $a)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{\Carbon\Carbon::parse($a->crated_at)->toDateString()}}</td>
                                        <td>{{$a->address}}</td>

                                        <td><a href="{{$a->email == null ? '#' : route('admin_user_view',['id' => encrypt($a->user->id)])}}" class="btn btn-primary">{{$a->email == null ? 'Not Matched' : $a->email}}</a> </td>
                                        <td>@if($a->status == 1) Used @else Not Used @endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                    @endif
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <h2 style="text-align: center;"> Add BTC</h2>
                    <form action="{{route('admin_btc_post')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="btc" id="btc" required placeholder="BTC Address" required/>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-save"></i> Save</button>
                    </form>
                </div>
            </div>

        </header>
        <!-- Page Footer-->


    </div>
@endsection