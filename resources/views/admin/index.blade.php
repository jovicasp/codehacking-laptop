@extends('layouts.admin')


@section('content')
    <h1>Admin page</h1>

    @if(Session::has('not_admin_not_active'))
        <p class="bg-danger" style="color: white; font-size: 15px">{{Session::get('not_admin_not_active')}}</p>
    @endif



@endsection