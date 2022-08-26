@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('admin.posts.index')}}"><button>Posts</button></a>
            <form action="{{route('admin.posts.update', ['post' => $post->slug])}}" method="POST" enctype="multipart/form-data">
                <h1>Modify {{ $post->title }}</h1>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Cover Img</label>
                            <img class="img-fluid" src="{{ asset('storage/' . $post->cover_img) }}" alt="">
                            <input name="cover_img" type="file" class="form-control @error('cover_img') is-invalid @enderror"
                            placeholder="img" value="{{ old('cover_img', $post->cover_img) }}" required>
                            @error('cover_img')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Title" value="{{ old('title', $post->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <input name="content" type="text" class="form-control mb-3 @error('title') is-invalid @enderror"
                            placeholder="Content" value="{{ old('content', $post->content) }}" required>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Cateogory</label>
                            <select name="category_id" type="text" class="form-control mb-3 @error('category_id') is-invalid @enderror">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $post->category_id) === $category->id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tags[]" type="text" class="form-control mb-3 @error('tags') is-invalid @enderror" multiple>
                                <option value=""></option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('tags')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit">Submit</button>
                    </div>
                </div>
                
                
            </form>
            
        </div>
        
    </div>
</div>
@endsection

