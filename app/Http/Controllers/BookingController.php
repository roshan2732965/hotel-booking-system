<?php

namespace App\Http\Controllers;

use App\Booking;
use App\CanceledBooking;
use App\Client;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $booking = new Booking();
        $clients = Client::all();
        $rooms = Room::where('status', 1)->get();
        return view('bookings.create', compact('clients', 'rooms', 'booking'));
    }

    public function store(Request $request)
    {
        // Validate the Form
        $request->validate([
            'client_id' => 'required',
            'room_id' => 'required',
            'start_date' => 'required|after_or_equal:today',
            'end_date' => 'required|after_or_equal:start_date',
            'total_price' => 'required',
            'total_payment'=>'required|numeric|min:0',
            'payment_method' => 'required|string'

        ]);

        // dd($request->all());

        try {
            DB::beginTransaction();
        // Save into Database
            $booking = Booking::create([
                'client_id' => $request->client_id,
                'room_id' => $request->room_id,
                'user_id' => auth()->user()->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            $booking->payments()->create([
                'total_price' => $request->total_price,
                'total_payment' => $request->total_payment,
                'payment_method' => $request->payment_method, 
            ]);

            // Update Rooms status
            $room = Room::find($request->room_id);
            $room->status = 0;
            $room->save();

            DB::commit();

            session()->flash('msg', 'The Room Has been booked');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            // session()->flash('msg',$e->getMessage());
            session()->flash('msg','Something went wrong !! Please try again later !!');
            return redirect()->back();
        }

    }


    public function show($id)
    {
        $booking = Booking::find($id);
        return view('bookings.detail', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $booking = Booking::find($booking->id);
        $rooms = Room::all();
        $clients = Client::all();
        return view('bookings.edit', compact('booking', 'clients', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->update($request->all());
        $request->session()->flash('msg', 'Booking has been updated');
        return redirect('/booking');
    }

    public function destroy(Request $request, Booking $booking)
    {
        Booking::destroy($booking->id);
        $request->session()->flash('msg', 'Booking has been deleted');
        return redirect('booking');
    }

    public function cancel($room_id,$booking_id) {
        $booking = Booking::find($booking_id);
        $room = Room::find($room_id);
        
        $booking->status = 0;
        $booking->user_id = auth()->id();
        $booking->save();
        $room->status = 1;
        $room->save();
        
        session()->flash('msg','Booking has been canceled');
        return redirect('/booking');
        
    }

    public function canceledBookings() {
        $canceledBookings = Booking::where('status', 0)->get();
        return view('bookings.canceled', compact('canceledBookings'));
    }

}
