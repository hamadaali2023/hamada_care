<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\Patient;
use App\Speciality;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function allreport(Request $request)
    {
        return view('admin.reports.reports');
    }
    public function doctorsApointments(Request $request)
    {
        $doctors_apointments=Doctor::all();
        // $appointments=Appointment::all();

        foreach ($doctors_apointments as $item) {
            
            // $item->doctor= Doctor::where('id',$item->doctorId)->first('name')->name;
            // $item->doctorid= Doctor::where('id',$item->doctorId)->first('id')->id;
            $item->docapointment= Appointment::where('doctorId',$item->id)->get();
                                    // ->whereBetween('date', array($request->from_date, $request->to_date))
                                    
            $item->category= Speciality::all();

        }
        //dd($doctors_apointments);
        return view('admin.doctors.report',compact('doctors_apointments'));
    }


    function doctorSearch(Request $request)
    {
      if($request->ajax())
      {
        if($request->name != '' &&  $request->from_date != '' && $request->to_date != '')
        {
            $data=Doctor::where('first_name_ar',$request->name)->get();
            foreach ($data as $item) {            
                $item->docapointment= Appointment::where('doctorId',$item->id)->whereBetween('date', array($request->from_date, $request->to_date))->where('payment_status',1)->get();
                $item->category= Speciality::all();
            }
           
            // $data = DB::table('appointments')->whereBetween('date', array($request->from_date, $request->to_date))->get();
        }else{
            // $data = DB::table('appointments')->orderBy('date', 'desc')->get();
        }
        // dd($data);
        echo json_encode($data);
      }
    }

    public function doctorPdf( $id)
    {
        
        $docid = Doctor::findOrFail($id);
        // $data= Doctor::where('id',$docid->id)->get();
        
        //     foreach ($data as $item) {            
        //         $item->docapointment= Appointment::where('doctorId',$item->id)->get();
        //         $item->category= Speciality::all();
        //     }
        
        $data= Appointment::where('doctorId',$docid->id)->get();
        //  $data=Doctor::all();
            foreach ($data as $item) {            
                $item->patientname= Patient::where('id',$item->patientId)->first();
                $item->category= Speciality::all();
            }
            // dd($data);
        $fileName = 'Country_List.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $html = \View::make('admin.doctors.pdfappointment',compact('data','docid'));
        $html = $html->render();

        $mpdf->SetHeader('Chapter 1|Country list|{PAGENO}');
        $mpdf->SetFooter('this is footer');
        
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');
        // return view('admin.pdf.demo',compact('data'));
    }




    //#########################################################
    public function patientsppointments(Request $request)
    {
        $patient_apointments=Patient::all();
        // foreach ($patient_apointments as $item) {   
        //     $item->patientapointment= Appointment::where('patientId',$item->id)->get();
        //     $item->category= Speciality::all();
        // }
        return view('admin.patients.report',compact('patient_apointments'));
    }


    function patientsSearch(Request $request)
    {
        if($request->ajax())
        {
            if( $request->name != '' && $request->from_date != '' && $request->to_date != '')
            {
               
                $data=Patient::where('first_name_ar',$request->name)->get();
                foreach ($data as $item) {            
                    $item->patientapointment= Appointment::where('patientId',$item->id)->whereBetween('date', array($request->from_date, $request->to_date))->where('payment_status',1)->get();
                    $item->category= Speciality::all();
                }
            }else{
                // $data = DB::table('appointments')->orderBy('date', 'desc')->get();
            }
             // dd($data);
            echo json_encode($data);
            
        }
    }
    function patientsSearchTwo(Request $request)
    {
        if($request->ajax())
          {
            if( $request->name != '' && $request->from_date != '' && $request->to_date != '')
            {
                $pname=Patient::where('name',$request->name)->first();
            }else{
                // $data = DB::table('appointments')->orderBy('date', 'desc')->get();
            }
            echo json_encode($pname);
        }
    }

    public function patientPdf( $id)
    {
        
        $patientid = Patient::findOrFail($id);
       
        $data= Appointment::where('patientId',$patientid->id)->get();
            foreach ($data as $item) {            
                $item->doctorname= Patient::where('id',$item->doctorId)->first();

                $item->category= Speciality::all();
            }
        $fileName = 'Country_List.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $html = \View::make('admin.patients.pdfappointment',compact('data','patientid'));
        $html = $html->render();

        $mpdf->SetHeader('Chapter 1|Country list|{PAGENO}');
        $mpdf->SetFooter('this is footer');
        
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');
        // return view('admin.pdf.demo',compact('data'));
    }
    



    
}
