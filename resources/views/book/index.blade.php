@extends('layouts.app')

@section('template_title')
    {{ __('Marketplace para Intercambio de Libros Usados') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-center mb-4">
            <div class="search">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-1 d-flex justify-content-center">
                            <form action="{{ route('books.index') }}" method="GET" class="d-flex">
                                <i class='bx bx-search-alt'></i>
                                <input type="text" class="form-control me-2" placeholder="Buscar libros" name="search" value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <span id="card_title" class="h4 mb-0">
                        {{ __('Marketplace para Intercambio de Libros Usados') }}
                    </span>
                    <div class="float-right">
                        <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm" data-placement="left">
                            <i class="fa fa-plus"></i> {{ __('Crear Nuevo') }}
                        </a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success m-4">
                    <p class="mb-0">{{ $message }}</p>
                </div>
            @endif

            <div class="card-body bg-white">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    @foreach ($books as $index => $book)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="book-cover-wrapper">
                                    <img 
                                        src="@switch($index % 12)
                                                @case(0)
                                                    https://upload.wikimedia.org/wikipedia/en/a/a0/Harry_Potter_and_the_Prisoner_of_Azkaban.jpg
                                                    @break
                                                @case(1)
                                                    https://sirolopez.com/wp-content/gallery/portadas-libros/cache/portadas-libros05.jpg-nggid03689-ngg0dyn-0x720-00f0w010c010r110f110r010t010.jpg
                                                    @break
                                                @case(2)
                                                    https://sirolopez.com/wp-content/gallery/portadas-libros/cache/Libro-con-esquinas.jpg-nggid041057-ngg0dyn-0x720-00f0w010c010r110f110r010t010.jpg
                                                    @break
                                                @case(3)
                                                    https://sirolopez.com/wp-content/gallery/portadas-libros/cache/portadas-libros08.jpg-nggid03692-ngg0dyn-900x614-00f0w010c010r110f110r010t010.jpg
                                                    @break
                                                @case(4)
                                                    https://sirolopez.com/wp-content/gallery/portadas-libros/cache/portadas-libros08.jpg-nggid03692-ngg0dyn-900x614-00f0w010c010r110f110r010t010.jpg
                                                    @break
                                                @case(5)
                                                    https://sirolopez.com/wp-content/gallery/portadas-libros/cache/portadas-libros03.jpg-nggid03687-ngg0dyn-0x720-00f0w010c010r110f110r010t010.jpg
                                                    @break
                                                @case(6)
                                                    https://sirolopez.com/wp-content/gallery/portadas-libros/cache/portadas-libros07.jpg-nggid03691-ngg0dyn-0x720-00f0w010c010r110f110r010t010.jpg
                                                    @break
                                                @case(7)
                                                    https://sirolopez.com/wp-content/gallery/portadas-libros/cache/portadas-libros07.jpg-nggid03691-ngg0dyn-0x720-00f0w010c010r110f110r010t010.jpg
                                                    @break
                                                @case(8)
                                                    https://sirolopez.com/wp-content/gallery/portadas-libros/cache/portadas-libros06.jpg-nggid03690-ngg0dyn-0x720-00f0w010c010r110f110r010t010.jpg
                                                    @break
                                                @case(9)
                                                    https://sirolopez.com/wp-content/gallery/portadas-libros/cache/portadas-libros06.jpg-nggid03690-ngg0dyn-0x720-00f0w010c010r110f110r010t010.jpg
                                                    @break
                                                @case(10)
                                                    https://sirolopez.com/wp-content/gallery/portadas-libros/cache/portadas-libros06.jpg-nggid03690-ngg0dyn-0x720-00f0w010c010r110f110r010t010.jpg
                                                    @break
                                                @case(11)
                                                    https://sirolopez.com/wp-content/gallery/portadas-libros/cache/portadas-libros01.jpg-nggid03685-ngg0dyn-0x720-00f0w010c010r110f110r010t010.jpg
                                                    @break
                                                @endswitch"
                                        onerror="this.onerror=null; this.src='https://cdn.bookauthority.org/dist/images/book-cover-not-available.6b5a104fa66be4eec4fd.jpg';"
                                        class="card-img-top book-cover"
                                        alt="{{ $book->title }}"
                                    >
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-truncate" title="{{ $book->title }}">{{ $book->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
                                    <p class="card-text small">{{ Str::limit($book->description, 100) }}</p>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="badge bg-primary fs-6">${{ number_format($book->price, 2) }}</span>
                                        <span class="badge {{ $book->status == 'available' ? 'bg-success' : 'bg-secondary' }} fs-6">
                                            {{ $book->status == 'available' ? 'Disponible' : 'Vendido' }}
                                        </span>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                            <div class="btn-group w-100" role="group">
                                                <a class="btn btn-sm btn-primary" href="{{ route('books.show', $book->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}
                                                </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('books.edit', $book->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('¿Está seguro que desea eliminar este libro?')">
                                                    <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                </button>
                                            </div>
                                        </form>
                                        <a class="btn btn-sm btn-warning mt-2" href="{{ route('books.rate', $book->id) }}">
                                            <i class="fa fa-fw fa-star"></i> {{ __('Calificar') }}
                                        </a>
                                        <a class="btn btn-sm btn-info mt-2" href="{{ route('books.comment', $book->id) }}">
                                            <i class="fa fa-fw fa-comment"></i> {{ __('Comentar') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <small class="text-muted">ID Usuario: {{ $book->user_id }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    {!! $books->links() !!}
                </div>
            </div>
        </div>
    </div>
    <style>
        .search {
            background-color: #fff;
            padding: 4px;
            border-radius: 5px;
        }

        .search-1 {
            position: relative;
            width: 100%;
        }

        .search-1 input {
            height: 45px;
            border: none;
            width: calc(100% - 90px);
            padding-left: 34px;
            padding-right: 10px;
        }

        .search-1 input:focus {
            border-color: none;
            box-shadow: none;
            outline: none;
        }
        .search-1 i { position: absolute; top: 12px; left: 5px; font-size: 24px; color: #eee; } .search-1 button { position: absolute; right: 1px; top: 0px; border: none; height: 45px; background-color: red; color: #fff; width: 90px; border-radius: 4px; } .book-cover-wrapper { position: relative; width: 100%; padding-top: 150%; /* Aspect ratio 2:3 for book covers */ overflow: hidden; } .book-cover { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease; } .card:hover .book-cover { transform: scale(1.05); } .btn-group .btn { border-radius: 4px; margin: 0 2px; } .card { transition: all 0.3s ease; } .card:hover { transform: translateY(-5px); box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important; } .btn-sm { padding: 0.25rem 0.5rem; font-size: 0.875rem; } .card-title { font-weight: 600; margin-bottom: 0.5rem; } .badge { font-weight: 500; } /* Mejoras en la responsividad */ @media (max-width: 768px) { .btn-group { flex-direction: column; gap: 0.5rem; } .btn-group .btn { width: 100%; margin: 2px 0; } } </style> 
        @endsection
