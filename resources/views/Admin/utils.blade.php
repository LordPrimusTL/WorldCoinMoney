@extends('adminMaster')
@section('body')
    <div class="container" style="margin-top:30px;  margin-left: 30px;" >
        <div class="row">
            <h2> Utilities</h2>
            @include('Partials._message')
            <table class="table table-responsive table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Value</th>
                    <th>New Value</th>
                </thead>
                <tbody>
                    <?php $i = 1?>
                    @foreach($util as $u)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->value}}</td>
                            <td><form class="form-inline" action="{{route('admin_update_util')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="text" required class="form-control" id="new_value" name="new_value" placeholder="New Value"/>
                                    <input type="hidden"  id="id" name="id" value="{{$u->id}}"/>
                                    <input type="submit" class="btn btn-primary" style="margin-left: 20px;" value="Update"/>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection