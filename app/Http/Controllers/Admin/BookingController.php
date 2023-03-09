<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookingRequest;

class BookingController extends Controller
{
    public function available_rooms($checkin_date)
    {
        $available_rooms = DB::SELECT("SELECT * FROM rooms  WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN check_in AND check_out)");

        return response()->json(['available_rooms' => $available_rooms]);
    } 

    public function index()
    {
        $title = [
            'title' => 'Bookings'
        ];
        
        $bookings = Booking::orderBy('created_at', 'DESC')->get();

        return view('booking.index', $title, compact('bookings'));
    }

    public function create()
    {
        $title = [
            'title' => 'Add booking'
        ];
        
        $rooms = Room::all();
        $students = Student::all();

        return view('booking.admin-booking', $title, compact('rooms', 'students'));
    }

    public function save(BookingRequest $request)
    {
        $data = $request->validated();

        $booking = new Booking();

        $booking->student_id = $data['student'];
        $booking->room_id = $data['room'];
        $booking->check_in = $data['check_in'];
        $booking->check_out = $data['check_out'];

        $booking->save();

        return redirect()->route('bookings')->with('success', 'Room booking has been recorded successfully!');
    }

    public function view_booking_details($booking_id)
    {
        $title = [
            'title' => 'Booking details'
        ];
        $booking = Booking::findOrFail($booking_id);

        if ($booking) {
            return view('booking.details', $title, compact('booking'));
        }
    }
}
