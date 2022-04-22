@extends('layouts.admin')

@section('content')
    @if(Session::has('deleted_photo'))
        <div class="alert alert-warning " role="alert">
            <p class="bg-danger" style="color:white;font-size:15px;">{{Session::get('deleted_photo')}}</p>
        </div>
    @endif
    <h1>Media</h1>



    @if($photos)
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>File</th>
                <th>Created date</th>
                <th>Delete</th>
            </tr>
            </thead>

            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->path}}" alt=""></td>
                    <td>{{$photo->created_at ? $photo->created_at : "no date"}}</td>
                    {{--DELETE FORM--}}
                    <div class="form-group">
                        <td>
                            {!! Form::open(['method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdminMediasController@destroy', $photo->id]]) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop