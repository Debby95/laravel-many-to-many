@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Registered User</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <thead>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if(Auth::user()->role === 'admin')
                                    <a href="{{route('admin.users.edit', $user->id)}}"><button>Edit</button></a></td>
                                @endif
                                    {{-- <td><a href="{{route('admin.posts.show', ['post' => $post->slug])}}"><button>Show</button></a></td>
                            
                            @csrf
                            @method('DELETE')
                            <td><a href="{{route('admin.posts.destroy', ['post' => $post->slug])}}"><button>Delete</button></a></td>
                            --}}
                        </tr>
                    </thead>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
