<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function addView()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {

        $doctor = new doctor;

//        $request->file('image')->getClientOriginalExtension();

        $image = $request->file;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctor_image', $image_name);

        $doctor->image = $image_name;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room_no;

        $doctor->save();

        return redirect()->back();
    }

}
