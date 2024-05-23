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
    <form method="POST" action="{{ route('postes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title : </label>
            <input type="text" name=" title" class="form-control" placeholder="Enter title" value="{{ old('title') }}">
            @error('title')
                <div style="color: red;"> {{ $message }} </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Description : </label>
            <textarea class="form-control" name="body" value="{{ old('body') }}">
            </textarea>
            @error('body')
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
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
