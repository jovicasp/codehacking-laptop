@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))
        <p class="bg-danger" style="color:white;font-size:15px;">{{Session::get('deleted_post')}}</p>
    @endif

    <h1>Posts</h1>
    {!! '</br>' !!} {!! '</br>' !!}
    {{--<a href="{{ url('/cru') }}">--}}
    {{--<button class="btn btn-success" style="margin-left: 500px; margin-top: -40px; padding: 10px;font-size:12px">--}}
    {{--{{ "Create random user" }}--}}
    {{--</button>--}}
    {{--</a>--}}
    @if(Session::has('created_post'))
        <p class="bg-primary" style="color:white;font-size:15px;">{{Session::get('created_post')}}</p>
    @endif
    @if(Session::has('updated_post'))
        <p class="bg-primary" style="color:white;font-size:15px;">
            {{Session::get('updated_post')}}
        </p>
    @endif

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Owner</th>
            <th>Category</th>
            <th>First Photo</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>
                        @if($post->categories->first())
                            @foreach($post->categories as $category)
                                {{$category->name}}{!! "</br>" !!}
                            @endforeach
                        @else
                            {{'Uncategorized'}}
                        @endif
                    </td>
                    <div class="image-container">
                        <td>
                            <img height="40"
                                 src="{{$post->photos->first() ?
                                 ($post->photos->first())['path'] : 'https://via.placeholder.com/400x400'}}">
                        </td>
                    </div>
                    <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{Str::limit($post->content, 200)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td>{!! link_to_route('posts.edit', $title='Edit this Post',
                    $parameters=[$post->id, '<i class="fa fa-building"></i> Button'],
                    ['type'=>'button', 'class'=>'btn btn-primary']) !!}</td>
                    <div class="form-group">
                        <td>
                            {!! Form::open([
                            'method'=>'DELETE',
                            'action'=>['App\Http\Controllers\AdminPostsController@destroy',
                            $post->id]]) !!}
                            {!! Form::submit('Delete this Post',
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