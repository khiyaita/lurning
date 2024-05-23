@extends('layouts.master')
@section('main')
    @if (session()->has('success'))
        <x-toastify type="success">
            {{ session('success') }}
        </x-toastify>
    @endif

    <div class="body">
        @foreach ($postes as $poste)
            <!-- <h1>{{ $poste->user }}</h1> -->
            <div class="body">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        @if (Auth::id() === $poste->user->id)
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
        @endforeach
    </div>

    {{ $postes->links() }}
@endsection
