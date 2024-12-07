@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Clasificacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Clasificacion</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('ratings.update', $rating->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('rating.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
