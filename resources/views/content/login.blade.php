@extends('master')

@section('title', 'Login page')

@section('content')
    <h1 class="mx-3">Login</h1>
    <form action="{{ url('login') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email">Email address</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection
