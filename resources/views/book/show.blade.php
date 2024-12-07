@extends('layouts.app')

@section('template_title')
    {{ $book->name ?? __('Show') . " " . __('Book') }}
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/El_principito.jpg/330px-El_principito.jpg" class="card-img-top" alt="Book cover">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text">{{ $book->description }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Autor:</strong> {{ $book->author }}</li>
                <li class="list-group-item"><strong>Precio:</strong> {{ $book->price }}</li>
                <li class="list-group-item"><strong>ID Usuario:</strong> {{ $book->user_id }}</li>
                <li class="list-group-item"><strong>Estado:</strong> {{ $book->status }}</li>
            </ul>
            <div class="card-body">
                <a href="{{ route('books.index') }}" class="card-link">{{ __('Regresar') }}</a>
            </div>
        </div>
    </div>
@endsection
