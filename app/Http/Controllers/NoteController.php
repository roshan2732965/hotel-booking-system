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
        $enquiry = new Note();
        $clients = Client::all();
        return view('notes.create', compact('enquiry','clients'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'client_id' => 'required',
        ]);

        Note::create($request->all());

        $request->session()->flash('msg', 'Note has been added');    
        return redirect('/notes');
    }

    public function show(Note $enquiry)
    {
        $enquiry = Note::find($enquiry->id);
        return view('notes.detail', compact('enquiry'));
    }

    public function edit(Note $enquiry)
    {
        $enquiry = Note::find($enquiry->id);
        $clients = Client::all();
        return view('notes.edit', compact('enquiry','clients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'client_id' => 'required',
        ]);

        $enquiry = Note::find($id);
        $enquiry->update($request->all());
        $request->session()->flash('msg', 'Note has been updated');
        return redirect('/notes');
    }

    public function destroy(Note $enquiry)
    {
        Note::destroy($enquiry->id);
        request()->session()->flash('msg', 'Note has been deleted');
        return redirect('notes');
    }

    public function status($id)
    {
        // dd($id);
        $en = Note::find($id);
        $en = $en->update(['status'=>1]);
        return redirect('notes');
    }
}
