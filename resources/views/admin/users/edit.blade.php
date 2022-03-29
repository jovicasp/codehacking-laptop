@extends('layouts.admin')
@section('content')
    <h1>Edit User</h1>
    {{--{{$user->id}}--}}

    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->path : 'https://via.placeholder.com/400x400'}}" alt=""
             class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
        {!! Form::model($user, ['method'=>"PUT", 'action'=>["App\Http\Controllers\AdminUsersController@update", $user->id], 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', $user->name, ['class'=>'form-control']) !!}
        </div>
        {!! '</br>' !!}
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', $user->email, ['class'=>'form-control']) !!}
        </div>
        {!! '</br>' !!}
        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>
        {!! '</br>' !!}
        <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', [''=>'Choose Option'] + $roles, $user->role_id, ['class'=>'form-control']) !!}
        </div>
        {!! '</br>' !!}
        <div class="form-group">
            {!! Form::label('is_active', 'Status') !!}
            {!! Form::select('is_active', [1=>'Active', 0=>'Not Active'], $user->is_active, ['class'=>'form-control']) !!}
        </div>
        {{--PHOTO CE SE PRIKAZIVATI SAMO NA POCETKU A NE I PORED BROWSE ZA NOVU SLIKU--}}
        {!! '</br>' !!}
        <div class="form-group">
        {!! Form::label('photo_id', 'Photo') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        {{--<div class="image-container" style="margin: -30px 0px 0px 310px;">--}}
        {{--<td>--}}
        {{--<img height="40" src="{{$user->photo ? $user->photo->path : 'no photo file'}}">--}}
        {{--</td>--}}
        {{--</div>--}}
        </div>
        {!! '</br>' !!}{!! '</br>' !!}
        {{--//ZA SNIPET SUBMIT ////////////--}}
        <div class="form-group">
            {!! Form::submit('Update User',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
            {!! '</br>' !!}

            {{--//DELETE FORM--}}
            {!! Form::open(['method'=>'DELETE',
            'action'=>['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}
            {!! Form::submit('Delete this User',
                ['class'=>'btn btn-danger', 'style'=>'float: right; margin-top: -20px;']) !!}
            {{--['class'=>'btn btn-danger', 'style'=>'float: right;margin-top: -40px;']) !!}--}}
            {!! Form::close() !!}
        </div>
        {{--/////////////////////////////--}}

        @include('includes.display-form-errors')
    </div>
@endsection
