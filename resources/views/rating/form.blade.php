<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('ID Usuario') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $rating?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rater_id" class="form-label">{{ __('ID Evaluador') }}</label>
            <input type="text" name="rater_id" class="form-control @error('rater_id') is-invalid @enderror" value="{{ old('rater_id', $rating?->rater_id) }}" id="rater_id" placeholder="Rater Id">
            {!! $errors->first('rater_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rating" class="form-label">{{ __('Clasificacion') }}</label>
            <input type="text" name="rating" class="form-control @error('rating') is-invalid @enderror" value="{{ old('rating', $rating?->rating) }}" id="rating" placeholder="Rating">
            {!! $errors->first('rating', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="comment" class="form-label">{{ __('Comentario') }}</label>
            <input type="text" name="comment" class="form-control @error('comment') is-invalid @enderror" value="{{ old('comment', $rating?->comment) }}" id="comment" placeholder="Comment">
            {!! $errors->first('comment', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Entregar') }}</button>
    </div>
</div>