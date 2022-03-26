@extends('layouts.admin')


@section('content')
    <h1>Users</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Photo</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <div class="image-container">
                        <td><img height="40" src="{{$user->photo ? $user->photo->path : 'no photo file'}}"></td>
                        {{--<td><img height="40" src="/images/{{$user->photo ? $user->photo->path : 'no photo file'}}"></td>--}}
                    </div>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>




@endsection






