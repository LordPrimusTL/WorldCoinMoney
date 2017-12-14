@extends('adminMaster')
@section('body')
    <div class="container" style="margin-top:30px;  margin-left: 30px;" >
        <div class="row">
            <h2>Testimonials</h2>
            <div class="col-lg-12">@include('Partials._message')</div>
            <div class="col-lg-7">
                <table class="table table-responsive table-bordered">
                    <thead>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Word</th>
                    <th>Image</th>
                    </thead>
                    <tbody>
                    <?php $i = 1?>
                    @foreach($test as $u)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($u->created_at)}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->word}}</td>
                            <td><img src="{{"http://localhost:8000/uploads/".$u->image}}" height="200" weight="200"/> </td>
                            {{--<td>{{public_path()."$u->image"}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4" style="margin-left: 10px;">
                <h4 class="card-title" style="margin-top: 15px; font-family: 'Andale Mono'" >Save Testimonial</h4>
                <form action="{{route('admin_testimonial_post')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <label for="name">Name:</label>
                    <div class="form-group">
                       <input class="form-control" type="text" placeholder="Name" id="name" name="name"/>
                    </div>
                    <label for="word">Word:</label>
                    <div class="form-group">
                        <textarea type="text" class="form-control" rows="5" id="word" name="word" placeholder="Word"></textarea>
                    </div>
                    <label for="priority">Image: </label>
                    <div class="form-group">
                       <input type="file" class="form-control" id="image" name="image"/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit"><span><i class="fa fa-send"></i></span> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection