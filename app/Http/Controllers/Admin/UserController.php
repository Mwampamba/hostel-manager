<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Booking;

class UserController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'Users'
        ];

        $users = User::all();

        return view('admin.staff.index', $title, compact('users'));
    }

    public function dashboard()
    {
        $title = [
            'title' => 'Dashboard'
        ];

        $bookings = Booking::all()->count();
        $rooms = Room::all()->count();

        return view('admin.dashboard', $title, compact('bookings', 'rooms'));
    }

    public function add_new_user()
    {
        $title = [
            'title' => 'Dashboard'
        ];
        return view('admin.staff.create', $title);
    }

    public function save_user(UserRequest $request)
    {
        $data = $request->validated();

        if ($data['password'] === $data['repeat_password']) {
            $user = new User();

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->role = '0';

            if ($request->hasfile('picture')) {
                $file = $request->file('picture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/users/', $filename);
                $user->picture = $filename;

                $default_password = $data['password'];
                $body = "You can now use this as your default password. Don't forget to change it";

                Hash::make($default_password);

                Mail::send(
                    'admin.authentication.default-password',
                    ['default_password' => $default_password, 'body' => $body],
                    function ($message) use ($request) {
                        $message->from('hostelmanager@uaut.ac.tz', 'Hostel Management System');
                        $message->to($request->email, 'Pascal Machabya')
                            ->subject('Default Password');
                    }
                );

                $user->password = Hash::make($default_password);
                $user->save();

                return redirect()->route('users')->with('success', 'User has been registered successfully!');
            } else {
                return redirect()->back()->with('error', 'Password does not match!');
            }
        }
    }

    public function edit_user($user_id)
    {
        $title = [
            'title' => 'Update user'
        ];

        $user = User::findOrFail($user_id);

        return view('admin.staff.update', $title, compact('user'));
    }

    public function update_user(UserRequest $request, $user_id)
    {
        $data = $request->validated();

        $user = User::findOrFail($user_id);

        if ($data['password'] === $data['repeat_password']) {

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->role = '0';

            if ($request->hasfile('picture')) {
                $file = $request->file('picture');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/users/', $filename);
                $user->picture = $filename;

                $default_password = $data['password'];
                $body = "You can now use this as your default password. Don't forget to change it";

                Hash::make($default_password);

                Mail::send(
                    'admin.authentication.default-password',
                    ['default_password' => $default_password, 'body' => $body],
                    function ($message) use ($request) {
                        $message->from('hostelmanager@uaut.ac.tz', 'Hostel Management System');
                        $message->to($request->email, 'Pascal Machabya')
                            ->subject('Password Updation');
                    }
                );

                $user->password = Hash::make($default_password);
                $user->update();

                return redirect()->route('users')->with('success', 'User has been updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Password does not match!');
            }
        }
    }

    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);

        if ($user) {
            $user->delete();

            return redirect()->route('users')->with('error', 'User has been deleted successfully!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
