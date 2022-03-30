@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_user'))
        <p class="bg-danger"  style="color:white;font-size:15px;">{{Session::get('deleted_user')}}</p>
    @endif

    <h1>Users</h1>

    <a href="{{ url('/cru') }}">
        <button class="btn btn-success" style="margin-left: 500px; margin-top: -40px; padding: 10px;font-size:12px">
            {{ "Create random user" }}
        </button>
    </a>
    @if(Session::has('created_user'))
        <p class="bg-primary"  style="color:white;font-size:15px;">{{Session::get('created_user')}}</p>
    @endif
    @if(Session::has('updated_user'))
        <p class="bg-primary" style="color:white;font-size:15px;">
            {{Session::get('updated_user')}}
        </p>
    @endif

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <div class="image-container">
                        <td><img height="40"
                                 src="{{$user->photo ? $user->photo->path : 'https://via.placeholder.com/400x400'}}">
                        </td>
                    </div>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td>{!! link_to_route('users.edit', $title='Edit this user',
                    $parameters=[$user->id, '<i class="fa fa-building"></i> Button'],
                    ['type'=>'button', 'class'=>'btn btn-primary']) !!}</td>
                    <div class="form-group">
                        <td>
                            {!! Form::open(['method'=>'DELETE','action'=>['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}
                            {!! Form::submit('Delete this User',
                            ['class'=>'btn btn-danger']) !!}
                            {{--['class'=>'btn btn-danger', 'style'=>'float: right;margin-top: -40px;']) !!}--}}
                            {!! Form::close() !!}
                        </td>
                    </div>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>




@endsection






