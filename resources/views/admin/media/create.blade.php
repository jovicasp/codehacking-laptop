@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
@stop

@section('content')

    <h1>Upload Media</h1>

    {!! '</br>' !!}
    {{--FLASH MESSAGE DOES NOT WORK!--}}
    {{--@if(Session::has('created_photo'))--}}
        {{--<div class="alert alert-warning " role="alert">--}}
            {{--<p class="bg-primary" style="color:white;font-size:15px;">{{Session::get('created_photo')}}</p>--}}
        {{--</div>--}}
    {{--@endif--}}
    {!! '</br>' !!}

    {!! Form::open(['method'=>"POST",
    'action'=>"App\Http\Controllers\AdminMediasController@store", 'class'=>'dropzone']) !!}
    {!! Form::close() !!}
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    {{--<script>window.location.reload();</script>--}}
@stop