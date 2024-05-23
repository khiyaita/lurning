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
    <form method="post" action="{{ route('postes.update', $poste) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Title </label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $poste->title) }}"
                placeholder="Enter title">
            @error('title')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>body </label>
            <input type="body" name="body" class="form-control" value="{{ old('body', $poste->body) }}"
                placeholder="Enter body">
            @error('body')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Image : </label>
            <input type="file" name="image" value="{{ $poste->image }}">
            @error('image')
                <div style="color: red;"> {{ $message }} </div>
            @enderror
            <img class="card-img-top" src="{{ asset('storage/' . $poste->image) }}" alt="Card image">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
