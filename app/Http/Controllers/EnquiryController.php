<?php

namespace App\Http\Controllers;

use App\Client;
use App\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $enquiries = Enquiry::all();
        return view('enquiries.index', compact('enquiries'));
    }

    public function create()
    {
        $enquiry = new Enquiry();
        $clients = Client::all();
        return view('enquiries.create', compact('enquiry','clients'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'client_id' => 'required',
        ]);

        Enquiry::create($request->all());

        $request->session()->flash('msg', 'Enquiry has been added');    
        return redirect('/enquiries');
    }

    public function show(Enquiry $enquiry)
    {
        $enquiry = Enquiry::find($enquiry->id);
        return view('enquiries.detail', compact('enquiry'));
    }

    public function edit(Enquiry $enquiry)
    {
        $enquiry = Enquiry::find($enquiry->id);
        $clients = Client::all();
        return view('enquiries.edit', compact('enquiry','clients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'client_id' => 'required',
        ]);

        $enquiry = Enquiry::find($id);
        $enquiry->update($request->all());
        $request->session()->flash('msg', 'Enquiry has been updated');
        return redirect('/enquiries');
    }

    public function destroy(Enquiry $enquiry)
    {
        Enquiry::destroy($enquiry->id);
        request()->session()->flash('msg', 'Enquiry has been deleted');
        return redirect('enquiries');
    }

    public function status($id)
    {
        // dd($id);
        $en = Enquiry::find($id);
        $en = $en->update(['status'=>1]);
        return redirect('enquiries');
    }
}
