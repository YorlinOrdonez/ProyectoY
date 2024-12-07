@extends('layouts.app')

@section('template_title')
    {{ $rating->name ?? __('Show') . " " . __('Rating') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Rating</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('ratings.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>User Id:</strong>
                            {{ $rating->user_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Rater Id:</strong>
                            {{ $rating->rater_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Rating:</strong>
                            {{ $rating->rating }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Comment:</strong>
                            {{ $rating->comment }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
