<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookingRequest;
use App\Http\Requests\Admin\StudentBookingRequest;

class StudentBookingController extends Controller
{
    public function available_rooms($checkin_date)
    {
        $available_rooms = DB::SELECT("SELECT * FROM rooms  WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN check_in AND check_out)");

        return response()->json(['available_rooms' => $available_rooms]);
    }

    public function create_student_booking()
    {
        $title = [
            'title' => 'Booking'
        ];

        $rooms = Room::orderBy('created_at', 'ASC')->get()->take(4);
        $room_price = Room::where('price', '1')->first();
        
        return view('booking.student-booking', $title, compact('rooms', 'room_price'));
    }

    public function save_student_booking(StudentBookingRequest $request)
    {
        $data = $request->validated();

        if(!empty($data['student'])){

            $booking = new Booking();

            $booking->student_id = $data['student'];
            $booking->room_id = $data['room'];
            $booking->check_in = $data['check_in'];
            $booking->check_out = $data['check_out'];


            $booking->save();

            return redirect()->back()->with('success', 'Booking has been recorded successfully!');
        }

        else{
            return redirect()->route('registerStudent')->with('error', 'You have to register first before booking!');
        }
    }

}
