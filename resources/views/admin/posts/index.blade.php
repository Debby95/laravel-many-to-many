@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="{{route('admin.posts.create')}}"><button>New Post</button></a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Slug</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <thead>
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>
                                <div>{{ $post->category ? $post->category->name : '' }}</div>
                                <div>{{ $post->tags->implode('name', ' - ') }}</div>
                            </td>
                            <td>
                                <a href="{{route('admin.posts.show', ['post' => $post->slug])}}">
                                    <button>Show</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('admin.posts.edit', ['post' => $post->slug])}}">
                                    <button>Edit</button>
                                </a>
                            </td>
                            @csrf
                            @method('DELETE')
                            <td>
                                <a href="{{route('admin.posts.destroy', ['post' => $post->slug])}}">
                                    <button>Delete</button>
                                </a>
                            </td>
                        </tr>
                    </thead>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


