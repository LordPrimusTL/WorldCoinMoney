@extends('master')
@section('body')
    <div class="container " style="margin-top:50px;margin-bottom:100px;">
        <div class="col-md-12 ">
            @include('Partials._message')
            <table class="table table-responsive table-striped table-success">
                <thead>
                <th>S/N</th>
                <th>Date</th>
                <th>ID</th>
                <th>Amount</th>
                <th>Note</th>
                <th>Name</th>
                <th>Type</th>
                <th>Status</th>
                </thead>
                <tbody>
                @php($i = 1)
                    @foreach($trans as $t)
                        <tr class="success">
                            <td>{{$i++}}</td>
                            <td>{{\Carbon\Carbon::parse($t->created_at)}}</td>
                            <td>{{$t->t_id}}</td>
                            <td>{{$t->amount}}</td>
                            <td>{{$t->descn}}</td>
                            <td>{{$t->tname->name}}</td>
                            <td>{{$t->ttype->type}}</td>
                            <td>{{$t->stat->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection