@extends('master')
@section('body')
    <div class="container " style="margin-top:50px;margin-bottom:100px;">
        <div class="col-md-offset-2 col-md-7 ">
            @include('Partials._message')
            <table class="table table-responsive table-striped table-success">
                <thead>
                <th>S/N</th>
                <th>Trade Account(WCM)</th>
                <th>Referral Account(WCM)</th>
                <th>Updated</th>
                </thead>
                <tbody>
                <tr class="success">
                    <td>1</td>
                    <td>{{$a->trade_bal}}</td>
                    <td>{{$a->ref_bal}}</td>
                    <td>{{\Carbon\Carbon::parse($a->updated_at)}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection