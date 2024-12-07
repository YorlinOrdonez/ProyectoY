<?php
namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Book;
use App\Http\Requests\RatingRequest;

/**
 * Class RatingController
 * @package App\Http\Controllers
 */
class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ratings = Rating::paginate();

        return view('rating.index', compact('ratings'))
            ->with('i', (request()->input('page', 1) - 1) * $ratings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rating = new Rating();
        return view('rating.create', compact('rating'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RatingRequest $request)
    {
        Rating::create($request->validated());

        return redirect()->route('books.index')
            ->with('success', 'Calificación creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rating = Rating::find($id);

        return view('rating.show', compact('rating'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rating = Rating::find($id);

        return view('rating.edit', compact('rating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RatingRequest $request, Rating $rating)
    {
        $rating->update($request->validated());

        return redirect()->route('ratings.index')
            ->with('success', 'Calificación actualizada exitosamente');
    }

    public function destroy($id)
    {
        Rating::find($id)->delete();

        return redirect()->route('ratings.index')
            ->with('success', 'Calificación eliminada exitosamente');
    }

    /**
     * Show the form for rating a book.
     */
    public function rate($id)
    {
        $book = Book::find($id);
        if (!$book) {
            abort(404, 'Libro no encontrado.');
        }
        return view('rating.rate', compact('book'));
    }

    /**
     * Show the form for commenting on a book.
     */
    public function comment($id)
    {
        $book = Book::find($id);
        if (!$book) {
            abort(404, 'Libro no encontrado.');
        }
        return view('rating.comment', compact('book'));
    }
}
