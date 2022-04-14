@extends('layouts.admin')


@section('content')
    <h1>Admin page</h1>

    @if(Session::has('not_admin_not_active'))
        <div class="alert alert-warning " role="alert">
            <p style="font-size: 15px">{{Session::get('not_admin_not_active')}}</p>
        </div>
    @endif





@endsection