@extends('adminMaster')
@section('body')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>
            <div class="col-lg-8">
                &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large"> Administrator</p>
            </div>
            <br/>
            <br/>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-4" style="margin-left: 3px;">
                    @include('Partials._message')
                    @if(count($admin) > 0)
                        <div class=" table table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1?>
                                @foreach($admin as $a)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$a->fullname}}</td>
                                        <td>{{$a->email}}</td>
                                        <td>@if($a->is_active) Active @else False @endif</td>
                                        <td> @if(Auth::user()->role_id == 1) <a href="{{route('admin_delete',['id' => $a->id * 8009 * 8009])}}" onclick="return confirm('Are you sure you want to delete this administrator? You can\'t Undo this Move');" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            @else N/A @endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                    @endif
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <h2 class="header" style="text-align: center;"> Add Administrator</h2>
                    <form action="{{route('admin_post')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="fullname" id="fullname" required placeholder="Full Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" required placeholder="Email Address"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" required placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="conf_password" id="conf_password" required placeholder="Confirm Password"/>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </header>
        <!-- Page Footer-->


    </div>
@endsection