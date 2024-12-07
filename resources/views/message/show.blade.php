@extends('layouts.app')

@section('template_title')
    {{ $message->name ?? __('Show') . " " . __('Message') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Message</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('messages.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Content:</strong>
                            {{ $message->content }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Sender Id:</strong>
                            {{ $message->sender_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Receiver Id:</strong>
                            {{ $message->receiver_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Book Id:</strong>
                            {{ $message->book_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
