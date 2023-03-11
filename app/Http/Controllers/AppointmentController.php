<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\Patient;
use App\Speciality;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $appointments=Appointment::all();

        foreach ($appointments as $item) {
            
            // $item->doctor= Doctor::where('id',$item->doctorId)->first('name')->name;
            // $item->doctorid= Doctor::where('id',$item->doctorId)->first('id')->id;
            $item->doctor= Doctor::where('id',$item->doctorId)->first();
            
            // $item->patient= Patient::where('id',$item->patientId)->first('name')->name;
            $item->patient= Patient::where('id',$item->patientId)->first();

            $item->category= Speciality::all();

        }
       // dd($appointments);
        return view('admin.appointment-list',compact('appointments'));
    }


    public function destroy(Appointment $appointment)
    {        
            $appointment->delete();                     
            return redirect('appointments')->with("message",'تم مسح العنصر بنجاح'); 
           //return back()->route('admin/specialities');
    } 


    public function updateStatus(Request $request)
    {
        $user = Appointment::findOrFail($request->appointmentId);
        $user->status = $request->status;
        
        $user->save();

        return redirect()->route('appointments.index')->with("message", 'تم التعديل بنجاح');
    }
}
