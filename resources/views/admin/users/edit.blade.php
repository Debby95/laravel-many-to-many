@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('admin.users.index') }}"><button>Posts</button></a>
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            <h1>Modify user {{ $user->id }}</h1>
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                placeholder="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="text" class="form-control mb-3 @error('email') is-invalid @enderror"
                placeholder="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label>Address</label>
                <input name="address" type="text" class="form-control mb-3 @error('address') is-invalid @enderror"
                placeholder="address" value="{{ old('address', $user->details ? $user->details->address : '') }}" required>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label>City</label>
                <input name="city" type="text" class="form-control mb-3 @error('city') is-invalid @enderror"
                placeholder="city" value="{{ old('city', $user->details ? $user->details->city : '') }}" required>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label>Province</label>
                <input name="province" type="text" class="form-control mb-3 @error('province') is-invalid @enderror"
                placeholder="province" value="{{ old('province', $user->details ? $user->details->province : '') }}" required>
            @error('province')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input name="phone" type="text" class="form-control mb-3 @error('phone') is-invalid @enderror"
                placeholder="phone" value="{{ old('phone', $user->details ? $user->details->phone : '') }}" required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <button type="submit">Submit</button>
            </form>
            
        </div>
        
    </div>
</div>
@endsection

