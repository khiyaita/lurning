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
    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name : </label>
            <input type="text" name=" name" class="form-control" placeholder="Enter name" value="{{ old('name') }}">
            @error('name')
                <div style="color: red;"> {{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email : </label>
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
        <div class="form-group">
            <label>Password confirmed : </label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
            @error('password_confirmation')
                <div style="color: red;"> {{ $message }} </div>
            @enderror
        </div>
        <span class="form-check">
            <label>Sexe : </label>
            <input type="checkbox" name="sexe" value="male" class="form-check-input">
            <label class="form-check-label">Male</label>
        </span>
        <span class="form-check">
            <input type="checkbox" name="sexe" value="female" class="form-check-input">
            <label class="form-check-label">Female</label>
        </span>
        <br />
        @error('sexe')
            <div style="color: red;"> {{ $message }} </div>
        @enderror
        <br />
        <div class="form-group">
            <label>Pays : </label>
            <select class="form-control" name="pays">
                <option>{{ old('pays') }}</option>
                @foreach ($countries as $countrie)
                    <option>{{ $countrie }}</option>
                @endforeach
            </select>
            @error('pays')
                <div style="color: red;"> {{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Image : </label>
            <input type="file" name="image">
            @error('image')
                <div style="color: red;"> {{ $message }} </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Sing Up</button> or
        <a href="{{ route('login') }}" class="btn btn-secondary">Log In</a>
    </form>
@endsection
