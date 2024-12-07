@extends('layouts.app')

@section('template_title')
    {{ __('Calificaciones') }}
@endsection

@section('content')
    <div class="container">
        <h1 class="my-4">{{ __('Calificaciones y Comentarios') }}</h1>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <h4>{{ __('Calificaciones') }}</h4>
                <!-- Aquí puedes mostrar la lista de calificaciones -->
                @foreach ($ratings as $rating)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $rating->book->title }}</h5>
                            <p class="card-text">{{ $rating->comment }}</p>
                            <p class="card-text"><small class="text-muted">{{ __('Calificación:') }} {{ $rating->rating }} / 5</small></p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <h4>{{ __('Dejar una Calificación') }}</h4>
                <form action="{{ route('ratings.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="book_id">{{ __('Libro') }}</label>
                        <select name="book_id" class="form-control" required>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
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
                    </div>
                    <div class="form-group mt-3">
                        <label for="comment">{{ __('Comentario') }}</label>
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">{{ __('Enviar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
