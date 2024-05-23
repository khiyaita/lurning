@extends('layouts.master')
@section('main')
    @if (session()->has('success'))
        <x-toastify type="success">
            {{ session('success') }}
        </x-toastify>
    @endif
    <div class="body">
        @foreach ($users as $user)
                <!-- <h1>{{$user->postes}}</h1> -->
            <div class="body">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/' . $user->image) }}" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                        <a href="{{ route('users.show', $user) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-success">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $users->links() }}
@endsection
