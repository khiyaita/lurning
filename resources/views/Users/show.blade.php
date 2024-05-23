@extends('layouts.master')
@section('main')
    @if (session()->has('success'))
        <x-toastify type="success">
            {{ session('success') }}
        </x-toastify>
    @endif

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('images/' . $user->image) }}" alt="Card image">
        <div class="card-body">
            <h5 class="card-title">name : {{ $user->name }}</h5>
            <h6 class="card-title">sexe : {{ $user->sexe }}</h6>
            <h6 class="card-title">pays : {{ $user->pays }}</h6>
            <p class="card-text">email : {{ $user->email }}</p>
            <p class="card-text">created_at : {{ $user->created_at->format('d-m-Y') }}</p>
            @guest
                <form method="post" action="{{ route('users.destroy', $user) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            @endguest
        </div>
    </div>
    @auth
        @foreach ($postes as $poste)
            @if ($poste->user_id === $user->id)
                <div class="body">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            @if (Auth::id() === $user->id)
                                <div class="card-btn">
                                    <a href= "{{ route('postes.edit', $poste) }}" class="btn btn-success">Edit</a>
                                    <form method="post" action="{{ route('postes.destroy', $poste) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </div>
                            @endif
                            <h5 class="card-title">{{ $poste->title }}</h5>
                            <p class="card-text">{{ $poste->body }}</p>
                        </div>
                        <img class="card-img-top" src="{{ asset('storage/' . $poste->image) }}" alt="Card image">
                    </div>
                </div>
            @endif
        @endforeach
    @endauth
@endsection
