<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dormitory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DormitoryRequest;

class DormitoryController extends Controller
{
    public function index()
    {
        $title = [
            'title' => 'Dormitories'
        ];

        $dormitories = Dormitory::all();
        return view('admin.dom.index', $title, compact('dormitories'));
    }

    public function add_new_dormitory()
    {
        $title = [
            'title' => 'Add dormitory'
        ];

        return view('admin.dom.create', $title);
    }

    public function save_dormitory(DormitoryRequest $request)
    {
        $data = $request->validated();

        $dormitory = new Dormitory();

        $dormitory->name = $data['dormitory_name'];
        $dormitory->description = $data['description'];

        $dormitory->save();

        return redirect()->route('dormitories')->with('success', 'Dormitory has been saved successfully!');
    }

    public function edit_dormitory($dormitory_id)
    {
        $title = [
            'title' => 'Update dormitory'
        ];
        $dormitory = Dormitory::findOrFail($dormitory_id);

        return view('admin.dom.update', $title, compact('dormitory'));
    }

    public function update_dormitory(DormitoryRequest $request, $dormitory_id)
    {
        $data = $request->validated();

        $dormitory = Dormitory::findOrFail($dormitory_id);

        if ($dormitory) {
            $dormitory->name = $data['dormitory_name'];
            $dormitory->description = $data['description'];

            $dormitory->update();

            return redirect()->route('dormitories')->with('success', 'Dormitory has been updated successfully!');
        }
    }

    public function destroy($dormitory_id)
    {
        $dormitory = Dormitory::findOrFail($dormitory_id);

        if ($dormitory) {
            $dormitory->delete();

            return redirect()->route('dormitories')->with('error', 'Dormitory has been deleted successfully!');
        }
    }
}
