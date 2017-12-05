@if(Session::has('success'))
    <div class="alert alert-dismissible alert-success" style="margin-left: 10px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><i class="fa fa-thumbs-up"></i> Success:</strong> {{Session::get('success')}}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-dismissible alert-danger" style="margin-left: 10px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="margin-left: 10px;"><i class="fa fa-close"></i>Error:</strong> {{Session::get('error')}}
    </div>
@endif
@if(Session::has('warning'))
    <div class="alert alert-dismissible alert-warning" style="margin-left: 10px;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="margin-left: 10px;"><i class="fa fa-warning"></i>Warning:</strong> {{Session::get('warning')}}
    </div>
@endif

@if(Auth::check())
    @php($msg = \App\Info::where(['user_id' => Auth::id()])->where('read_count', '<=' ,3)->get())
    @foreach($msg as $m)
        <div class="alert @if($m->priority == 'HIGH') alert-info @elseif($m->priority == "MEDIUM") alert-success  @elseif($m->priority == "LOW") alert-warning @endif" style="margin-left: 10px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong style="margin-left: 10px;"><i class="fa fa-comment"></i>Matrix Status:</strong> {{$m->message}}
        </div>
    @endforeach
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger" style="margin-left: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif