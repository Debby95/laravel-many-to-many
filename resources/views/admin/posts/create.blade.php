@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('admin.posts.index')}}"><button>Create</button></a>
            <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3 mt-3">
                <label>Cover Img</label>
                <input name="cover_img" type="file" class="form-control  @error('cover_img') is-invalid @enderror"
                placeholder="img" value="{{old('cover_img')}}" required>
                @error('cover_img')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Title</label>
                <input name="title" type="text" class="form-control mb-3 @error('title') is-invalid @enderror"
                placeholder="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" type="text" class="form-control mb-3 @error('content') is-invalid @enderror" rows="10"
                placeholder="content" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Cateogory</label>
                <select name="category_id" type="text" class="form-control mb-3 @error('category_id') is-invalid @enderror"
                placeholder="Category">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tags</label>
                <select type="text" name="tags[]" class="form-control mb-3 @error('tags') is-invalid @enderror" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">
                        {{ $tag->name }}</option>
                    @endforeach
                </select>
                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Submit</button>
            </form>
            
        </div>
        
    </div>
</div>
@endsection