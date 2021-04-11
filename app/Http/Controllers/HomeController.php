<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Facility;
use App\Models\Feature;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $room = Room::latest()->get();
        return view('home', compact('room'));
    }

    public function create($slug)
    {
        $room = Room::where('slug', $slug)->first();
        $booking = Booking::orderBy('created_at', 'DESC')->where('room_id', $room->id)->first();
        $count = Booking::orderBy('created_at', 'DESC')->where('room_id', $room->id)->count();
        $feature = Feature::with('facility')->where('room_id', $room->id)->where('status', 1)->get();
        return view('booking', compact('room', 'booking', 'count', 'feature'));
    }

    public function store(Request $request, $id)
    {
        $crud = Booking::create([
            'user_id' => Auth::user()->id,
            'room_id' => $id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        if ($crud) {
            return redirect()->route('home.detail')->with('status', 'Success');
        } else {
            return redirect()->back()->with('status', 'Failed');
        }
    }

    public function detail(){
        $date = date('Y-m-d H:i:s', strtotime(now()));
        $booking = Booking::with('room')->orderBy('created_at', 'ASC')->where('check_out', '>=', $date)->get();

        return view('detail', compact('booking'))->with('i');
    }

    public function myroom(){
        $date = date('Y-m-d H:i:s', strtotime(now()));
        $booking = Booking::with('room')->orderBy('created_at', 'ASC')->where('check_out', '>=', $date)->get();

        return view('myroom', compact('booking'))->with('i');
    }

    public function pay($id){
        $booking = Booking::with('room')->findOrFail($id);

        $day = strtotime($booking->check_out) - strtotime($booking->check_in);
        $day = date('d', $day);
        $day = str_replace('0', '', $day);

        $count = $day * $booking->room->price;

        return view('pay', compact('booking', 'day', 'count'))->with('i');
    }

    public function destroy($id){
        $booking = Booking::findOrFail($id);
        $crud = $booking->delete();

        if ($crud) {
            return redirect()->route('home.detail')->with('status', 'Success');
        }
    }
}

