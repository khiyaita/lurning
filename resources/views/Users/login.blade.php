@extends('layouts.master')
@section('main')
    @if ($errors->any())
        <x-alert type="danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif
    @if (session()->has('success'))
        <x-toastify type="success">
            {{ session('success') }}
        </x-toastify>
    @endif
    @if (session()->has('error'))
        <x-toastify type="error">
            {{ session('error') }}
        </x-toastify>
    @endif

    <form method="POST" action="{{ route('auth') }}">
        @csrf
        <div class="form-group">
            <label>Login : </label>
            <input type="email" name="email" class="form-control" placeholder="Enter email"value="{{ old('email') }}">
            @error('email')
                <div style="color: red;"> {{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Password : </label>
            <input type="password" name="password" class="form-control" placeholder="Password">
            @error('password')
                <div style="color: red;"> {{ $message }} </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Log In</button> or
        <a href="{{ route('users.create') }}" class="btn btn-secondary">Sing Up</a>
    </form>
@endsection
