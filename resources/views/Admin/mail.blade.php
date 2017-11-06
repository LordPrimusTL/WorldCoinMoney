@extends('adminMaster')
@section('body')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>
            <div class="col-lg-12 text-center">
                &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large"> Send Email</p>
            </div>
            <div class="col-lg 12 col-lg-4 col-lg-4">
                <a href="{{route('mail.all')}}" class="btn btn-primary btn-sm">
                    <i class="fa fa-send"></i> Send To All Users
                </a>
            </div>
            <br/>
            <br/>
            <div class="container row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    @include('Partials._message')
                    <form class="form-horizontal" method="POST" action="{{route('mail_send')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>To: </label>
                            <input type="text" class="form-control" name="to[]" id="to[]" placeholder="Recipients" required value="{{$user}}"/>
                            <p>Please Note That If Sending To Multiple Recipient, Seperate Each Recipient With A Comma (,)</p>
                        </div>
                        <div class="form-group">
                            <label>Subject: </label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required/>
                        </div>
                        <div class="form-group">
                            <label>Message: </label>
                            <textarea class="form-control" name="msg" id="msg" placeholder="Message Body" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-send"></i> Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </header>
        <!-- Page Footer-->


    </div>
@endsection