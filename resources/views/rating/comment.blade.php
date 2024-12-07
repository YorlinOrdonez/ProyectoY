@extends('layouts.app')

@section('template_title')
    {{ __('Comentar en Libro') }}
@endsection

@section('content')
    <div class="container">
        <h1 class="my-4">{{ __('Comentar en: ') }} {{ $book->title }}</h1>
        
        <form action="{{ route('ratings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <div class="form-group">
                <label for="comment">{{ __('Comentario') }}</label>
                <textarea name="comment" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">{{ __('Enviar') }}</button>
        </form>
    </div>
@endsection
