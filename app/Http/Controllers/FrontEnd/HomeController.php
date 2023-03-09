<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Room;
use App\Models\RoomImage;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $rooms = Room::orderBy('created_at', 'ASC')->get()->take(8);
        
        return view('index', compact('rooms'));

    }
}
