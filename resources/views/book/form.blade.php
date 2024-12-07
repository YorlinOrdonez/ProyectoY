<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="contact-clean">
        <form method="post">
            <h2 class="text-center">Detalles del Libro</h2>

            <div class="form-group mb-2">
                <label for="title" class="form-label">{{ __('Titulo') }}</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $book?->title) }}" id="title" placeholder="Title">
                {!! $errors->first('title', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2">
                <label for="author" class="form-label">{{ __('Autor') }}</label>
                <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $book?->author) }}" id="author" placeholder="Author">
                {!! $errors->first('author', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2">
                <label for="description" class="form-label">{{ __('Descripción') }}</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $book?->description) }}" id="description" placeholder="Description">
                {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2">
                <label for="price" class="form-label">{{ __('Precio') }}</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $book?->price) }}" id="price" placeholder="Price">
                {!! $errors->first('price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2">
                <label for="user_id" class="form-label">{{ __('Id Usuario') }}</label>
                <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $book?->user_id) }}" id="user_id" placeholder="User Id">
                {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="form-group mb-2">
                <label for="status" class="form-label">{{ __('Estado') }}</label>
                <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status', $book?->status) }}" id="status" placeholder="Status">
                {!! $errors->first('status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>

            <div class="form-group mt-4"><button class="btn btn-primary" type="submit">{{ __('Editar') }}</button></div>
        </form>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<style>
.contact-clean {
  background:#f1f7fc;
  padding:80px 0;
}

@media (max-width:767px) {
  .contact-clean {
    padding:20px 0;
  }
}

.contact-clean form {
  max-width:480px;
  width:90%;
  margin:0 auto;
  background-color:#ffffff;
  padding:40px;
  border-radius:4px;
  color:#505e6c;
  box-shadow:1px 1px 5px rgba(0,0,0,0.1);
}

@media (max-width:767px) {
  .contact-clean form {
    padding:30px;
  }
}

.contact-clean h2 {
  margin-top:5px;
  font-weight:bold;
  font-size:28px;
  margin-bottom:36px;
  color:inherit;
}

.contact-clean .form-group:last-child {
  margin-bottom:5px;
}

.contact-clean form .form-control {
  background:#fff;
  border-radius:2px;
  box-shadow:1px 1px 1px rgba(0,0,0,0.05);
  outline:none;
  color:inherit;
  padding-left:12px;
  height:42px;
}

.contact-clean form .form-control:focus {
  border:1px solid #b2b2b2;
}

.contact-clean form textarea.form-control {
  min-height:100px;
  max-height:260px;
  padding-top:10px;
  resize:vertical;
}

.contact-clean form .btn {
  padding:16px 32px;
  border:none;
  background:none;
  box-shadow:none;
  text-shadow:none;
  opacity:0.9;
  text-transform:uppercase;
  font-weight:bold;
  font-size:13px;
  letter-spacing:0.4px;
  line-height:1;
  outline:none !important;
}

.contact-clean form .btn:hover {
  opacity:1;
}

.contact-clean form .btn:active {
  transform:translateY(1px);
}

.contact-clean form .btn-primary {
  background-color:#055ada !important;
  margin-top:15px;
  color:#fff;
}
</style>
