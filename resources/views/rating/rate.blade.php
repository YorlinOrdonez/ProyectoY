@extends('layouts.app')

@section('template_title')
    {{ __('Calificar Libro') }}
@endsection

@section('content')
    <div class="container">
        <h1 class="my-4">{{ __('Calificar: ') }} {{ $book->title }}</h1>
        
        <form action="{{ route('ratings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <div class="form-group">
                <label for="user_id">{{ __('User Id') }}</label>
                <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id') }}" required>
                {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mt-3">
                <label for="rating">{{ __('Calificación') }}</label>
                <select name="rating" class="form-control" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                {!! $errors->first('rating', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mt-3">
                <label for="comment">{{ __('Comentario') }}</label>
                <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" rows="3" required></textarea>
                {!! $errors->first('comment', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <button type="submit" class="btn btn-primary mt-3">{{ __('Enviar') }}</button>
        </form>
    </div>
@endsection
