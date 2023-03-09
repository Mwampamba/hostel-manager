<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\RoomImage;
use App\Models\Dormitory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomRequest;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'Rooms'
        ];
        $rooms = Room::all();
        return view('admin.room.index', $title, compact('rooms'));
    }

    public function add_new_room()
    {
        $title = [
            'title' => 'Add room'
        ];
        $dormitories = Dormitory::all();
        return view('admin.room.create', $title, compact('dormitories'));
    }

    public function save_room(RoomRequest $request)
    {
        $data = $request->validated();

        $room = new Room();

        $room->name = $data['room_name'];
        $room->dormitory_id = $data['dormitory_name'];
        $room->description = $data['description'];
        $room->status = '1';
        $room->save();

        if ($request->hasfile('picture')) {
            $image_path = 'uploads/rooms/';

            $unique = 1;
            foreach ($request->file('picture') as $image_file) {
                $extension = $image_file->getClientOriginalExtension();
                $filename = time() . $unique++ . '.' . $extension;

                $image_file->move($image_path, $filename);
                $final_image_path = $image_path . $filename;

                $room->room_images()->create([
                    'room_id' => $room->id,
                    'image_path' => $final_image_path,
                    'room_name' => $data['room_name']
                ]);
            }
        }
        return redirect()->route('rooms')->with('success', 'Room has been saved successfully!');
    }

    public function view_room_details($room_id)
    {
        $title = [
            'title' => 'Room details'
        ];
        $room_data = Room::where('id', $room_id)->get();
        return view('admin.room.details', $title, compact('room_data'));
    }

    public function edit_room($room_id)
    {
        $title = [
            'title' => 'Update room'
        ];
        $room = Room::findOrFail($room_id);
        $dormitories = Dormitory::all();

        return view('admin.room.update', $title, compact('room', 'dormitories'));
    }

    public function update_room(RoomRequest $request, $room_id)
    {
        $data = $request->validated();

        $room = Dormitory::findOrFail($data['dormitory_name'])
            ->rooms()->where('id', $room_id)->first();
        if ($room) {
            $room->update([
                'name' => $data['room_name'],
                'dormitory_id' => $data['dormitory_name'],
                'description' => $data['description'],
                'status' => $data['status']
            ]);

            if ($request->hasfile('picture')) {
                $image_path = 'uploads/rooms/';

                $unique = 1;
                foreach ($request->file('picture') as $image_file) {
                    $extension = $image_file->getClientOriginalExtension();
                    $filename = time() . $unique++ . '.' . $extension;

                    $image_file->move($image_path, $filename);
                    $final_image_path = $image_path . $filename;

                    $room->room_images()->create([
                        'room_id' => $room->id,
                        'image_path' => $final_image_path,
                        'room_name' => $data['room_name']
                    ]);
                }
            }
            return redirect()->route('rooms')->with('success', 'Room has been updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function delete_product_image($product_image)
    {
        $room_image = RoomImage::findOrFail($product_image);

        if (File::exists($room_image->image_path)) {
            File::delete($room_image->image_path);
        }

        $room_image->delete();

        return redirect()->back()->with('error', 'Product image has been deleted successfully!');
    }

    public function destroy($room_id)
    {
        $room = Room::findOrFail($room_id);

        if ($room) {
            $room->delete();

            return redirect()->route('rooms')->with('error', 'Room has been deleted successfully!');
        }
    }
}
