<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Http\Requests\MessageRequest;
use Illuminate\Http\Request;

/**
 * Class MessageController
 * @package App\Http\Controllers
 */
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $messages = Message::query();

        if ($search) {
            $messages->where('content', 'LIKE', "%{$search}%");
        }

        $messages = $messages->paginate();
        $users = User::all(); // Agregando los usuarios

        return view('message.index', compact('messages', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * $messages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $message = new Message();
        return view('message.create', compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        Message::create($request->validated());

        return redirect()->route('messages.index')
            ->with('success', 'Mnesaje Creado Exitoxamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $message = Message::find($id);

        return view('message.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $message = Message::find($id);

        return view('message.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MessageRequest $request, Message $message)
    {
        $message->update($request->validated());

        return redirect()->route('messages.index')
            ->with('success', 'Mensaje Actualizado');
    }

    public function destroy($id)
    {
        Message::find($id)->delete();

        return redirect()->route('messages.index')
            ->with('success', 'Mnesaje Eliminado Exitosamente');
    }
}
