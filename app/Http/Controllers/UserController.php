<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Client;
use App\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $id = auth()->id();

        $user = User::where('id', $id)->first();

        return view('user.index', compact('user'));
    }
    public function clients()
    {
        return $this->HasMany(Booking::class);
    }

}
