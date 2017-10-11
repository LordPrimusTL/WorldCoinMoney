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
                    <h2> Support Ticket</h2>
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
                            <th>Category</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        @foreach($tick as $t)
                            <tr class="
                                @if($t->status === 'Open')
                                    alert-warning
                                @else
                                    alert-success
                                @endif">
                                <td>{{$i++}}</td>
                                <td>{{\Carbon\Carbon::parse($t->created_at)}}</td>
                                <td>{{$t->ticket_id}}</td>
                                <td><a href="{{route('admin_user_view',['id' => encrypt($t->user_id)])}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i> {{ $t->user->email}}</a> </td>
                                <td>{{$t->category->name}}</td>
                                <td>{{$t->title}}</td>
                                <td>{{$t->message}}</td>
                                <td>{{$t->status}}</td>
                                <td>
                                    @if($t->status === 'Open')
                                        <a href="{{route('admin_ticket_comment',['id' => encrypt($t->id)])}}" class="btn btn-success"> <i class="fa fa-comment"></i>  </a>
                                    @else
                                        {{$t->status}}
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