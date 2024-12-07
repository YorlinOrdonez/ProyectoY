<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="content" class="form-label">{{ __('Contenido') }}</label>
            <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content', $message?->content) }}" id="content" placeholder="Content">
            {!! $errors->first('content', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sender_id" class="form-label">{{ __('ID Remitente') }}</label>
            <input type="text" name="sender_id" class="form-control @error('sender_id') is-invalid @enderror" value="{{ old('sender_id', $message?->sender_id) }}" id="sender_id" placeholder="Sender Id">
            {!! $errors->first('sender_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="receiver_id" class="form-label">{{ __('ID Receptor') }}</label>
            <input type="text" name="receiver_id" class="form-control @error('receiver_id') is-invalid @enderror" value="{{ old('receiver_id', $message?->receiver_id) }}" id="receiver_id" placeholder="Receiver Id">
            {!! $errors->first('receiver_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="book_id" class="form-label">{{ __('ID Libro') }}</label>
            <input type="text" name="book_id" class="form-control @error('book_id') is-invalid @enderror" value="{{ old('book_id', $message?->book_id) }}" id="book_id" placeholder="Book Id">
            {!! $errors->first('book_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Entregar') }}</button>
    </div>
</div>