@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Libro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Libro</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('books.update', $book->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('book.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
