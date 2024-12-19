<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        $note = new Note();
        return view('notes.create', compact('note'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);
        $request->merge(['user_id' => auth()->id()]);

        Note::create($request->all());

        $request->session()->flash('msg', 'Note has been added');    
        return redirect('/notes');
    }

    public function show(Note $note)
    {
        $note = Note::find($note->id);
        return view('notes.detail', compact('note'));
    }

    public function edit(Note $note)
    {
        $note = Note::find($note->id);
        // $clients = Client::all();
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);

        $request->merge(['user_id' => auth()->id()]);
        $note = Note::find($id);
        $note->update($request->all());
        $request->session()->flash('msg', 'Note has been updated');
        return redirect('/notes');
    }

    public function destroy(Note $note)
    {
        Note::destroy($note->id);
        request()->session()->flash('msg', 'Note has been deleted');
        return redirect('notes');
    }

    public function status($id)
    {
        $en = Note::find($id);
        $en = $en->update(['status'=>1]);
        return redirect('notes');
    }
}
