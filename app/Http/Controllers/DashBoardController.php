<?php

namespace App\Http\Controllers;
use App\Appointment;
use App\Doctor;
use App\Patient;
use App\Speciality;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;
use App\Traits\GeneralTrait;

class DashBoardController extends Controller
{
        use GeneralTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $appointments=Appointment::all();
        foreach ($appointments as $item) {
            $item->doctor= Doctor::where('id',$item->doctorId)->first();
            $item->patient= Patient::where('id',$item->patientId)->first();
            $doc= Doctor::where('id',$item->doctorId)->first();
            
            $item->speciality= Speciality::where('id',$doc->specialityId)->first();
        }
        // dd($appointments);
        
        $doctors=Doctor::all();
        foreach ($doctors as $item) {
            // $item->categorynamear= Speciality::where('id',$item->specialityId)->first('name_ar')->name_ar;
            $item->categorynamear= Speciality::where('id',$item->specialityId)->first();
        }
        
       

        $patients=Patient::all();
        $doctorsCount = count($doctors);
        $patientsCount = count($patients);
        $appointmentsCount = count($appointments);




        // dd($notifications);
        // return \Response::json($notifications);
        // return $this->returnData('patients', $notifications);

        return view('admin.index_admin',compact('appointments','doctors','patients','doctorsCount','patientsCount','appointmentsCount'));
    }

    // public function create()
    // {
    //     return view('admin.sliders.create');
    // }
    

    // public function store(AircraftRequest $request)
    // {
    //     $userId = 1;
    //     $file_extension = $request -> file('logoone') -> getClientOriginalExtension();
    //     $file_name = time().'.'.$file_extension;
    //     $file_nameone = $file_name;
    //     $path = 'admin/images/aircraft';
    //     $request-> file('logoone') ->move($path,$file_name);

    //     $request->merge(['created_by'=>$userId]);
    //     $request->merge(['logo'=>$file_nameone]);
    //     //dd($request->all());
    //     Slider::create($request->all());
    //     return redirect()->back()->with("message", __('admin.createSuccess')); 
    // }

    
    // public function edit(Slider $slider)
    // {
    //     return view('admin.sliders.edit',compact('slider'));
    // }

    // public function update(AircraftRequest $request, Slider $slider)
    // {
    //     $userId = 1;
    //      if($file=$request->file('logoone'))
    //      {
    //         $file_extension = $request -> file('logoone') -> getClientOriginalExtension();
    //         $file_name = time().'.'.$file_extension;
    //         $file_nameone = $file_name;
    //         $path = 'admin/images/aircraft';
    //         $request-> file('logoone') ->move($path,$file_name);
    //         $request->merge(['logo'=>$file_nameone]);

    //          $request->merge(['updated_by'=>$userId]);
    //          $slider->update($request->all());
    //      }else{
    //       $request->merge(['logo'=> $request->url]);
    //       $request->merge(['updated_by'=>$userId]);
    //       $slider->update($request->all());
    //      }
       
    //     dd($request->all());
    //     //return redirect()->route('aircraft.index')->with("message", __('admin.updateSuccess')); 
    // }

    public function destroy(Slider $slider)
    {

        $Charter=Charter::where('aircraftId',$slider->id)->get(); 
        if(count($Charter) == 0){
            $slider->delete();
            return redirect()->route('aircraft.index')->with("message", __('admin.deleteSuccess')); 
        }else{
           return redirect()->back()->with("error", 'It is not allowed to delete this item'); 
        }

        
    } 
}
