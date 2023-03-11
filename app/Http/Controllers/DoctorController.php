<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\City;
use App\Country;
use App\Doctor;
use App\Language;
use App\Payment;
use App\WorkingDays;
use App\Companies_insurance;
use App\Patient_location;
use App\Patient_health_information;
use App\Traits\GeneralTrait;
use App\People_under_care;
use App\Patient_case;
use App\Doctor_activation;
use App\Block;
use App\Product;
use App\Order;
use App\SubCategory;
use App\Category;
use App\Order_image;
use App\Order_sub_category;
use App\Order_product;
use App\Doctor_certificate;
use App\Doctor_bank;
use App\Doctor_education;
use App\Doctor_insurance;
use App\Doctor_language;
use App\Doctor_experience;
use App\Doctor_license;
use App\Member_ship_type;
use App\Doctor_case;
use App\Doctor_service;
use Carbon\Carbon;
use Hash;
use Auth;
use Illuminate\Support\Str;
use DB;
use Mail;
class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:doctors', ['only' => ['index']]);
        // $this->middleware('permission:اضافة صلاحية', ['only' => ['create','store']]);
        // $this->middleware('permission:تعديل صلاحية', ['only' => ['edit','update']]);
        // $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);

    }

    public function index()
    {
       $doctors=Doctor::all();
       $specialities=Category::all();
        $countries=Country::all();
        $cities=City::all();
        foreach ($doctors as $item) {
            $item->categoryname= Category::where('id',$item->specialityId)->first();
        }
        return view('admin.doctors.all',compact('doctors','specialities','countries','cities'));
    }

    public function destroy(Request $request )
    {

        $delete = Doctor::findOrFail($request->id);
        $delete->delete();
        return redirect()->route('doctors.index')->with("message",'تم الحذف بنجاح');

    } 
    
    public function updateStatus(Request $request)
    {
       $user = Doctor::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['message' => 'User status updated successfully.']);
    }

    public function profile($doctor)
    {
        $doctors = Doctor::findOrFail($doctor);
        // dd($doctor);
        $workday= WorkingDays::where('doctorId',$doctor)->get();
        $services= Service::where('doctorId',$doctor)->get();
        $offers= Offer::where('doctorId',$doctor)->get();

        $appointments=Appointment::where('doctorId',$doctors->id)->get();
        foreach ($appointments as $item) {
            $item->doctor= Doctor::where('id',$item->doctorId)->first();
            $item->patient= Patient::where('id',$item->patientId)->first();
            $item->category= Speciality::all();
        }

        $reviews=Reviews::where('doctorId',$doctors->id)->get();
        foreach ($reviews as $item) {
            $item->patient= Patient::where('id',$item->patientId)->first();
        }

        $articles=Article::where('doctorId',$doctors->id)->get();
        $payment=Payment::where('doctorId',$doctors->id)->get();
        $sum=Payment::where('doctorId',$doctors->id)->sum('amount');
        foreach ($payment as $item) {
            $item->patient= Patient::where('id',$item->patientId)->first(); 
            // $item->apointment= Appointment::where('id',$item->appointmentId)->first();   
        }
        $specialities=Speciality::all();
        return view('admin.doctors.doctor-profile',compact(
                                        'doctors','offers','workday','services',
                                        'reviews','payment','sum','articles','appointments','specialities'));
    }
    public function changePassword(Request $request){
        $doctor=Doctor::where('id',$request->doctorId)->first();
        // dd($patient->password);
        $this->validate($request, [
            'current-password'     => 'required',
            'new-password'     => 'required',
            // 'confirm_password' => 'required|same:new_password',
        ]);
        // dd('ugutg');
        if (!(Hash::check($request->get('current-password'), $doctor->password))) {
            return redirect()->back()->with("error","كلمة المرور الحالية لا تتطابق مع كلمة المرور التي قدمتها. حاول مرة اخرى.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","لا يمكن أن تكون كلمة المرور الجديدة هي نفسها كلمة مرورك الحالية. الرجاء اختيار كلمة مرور مختلفة.");
        }

        $doctor->password = bcrypt($request->get('new-password'));
        $doctor->save();
        return redirect()->back()->with("message","تم تغيير الرقم السري بنجاح !");
    }

    
    public function getDocument( $id)
    {
        
        $docid = Doctor::findOrFail($id);
         
        View('admin.doctors.pdf',compact('docid'));
        
        // return view('admin.pdf.demo',compact('data'));
    }

    public function editServic($id)
    {
        $edit = Service::findOrFail($id);
        return view('admin.doctors.edit_servic',compact('edit'));
    }
    
    public function deletePayment(Request $request )
    {
        $delete = Payment::findOrFail($request->id);
        $delete->delete();
        return redirect()->back()->with("message",'تم الحذف بنجاح');
    }

    public function doctornotifaction()
    {
        $doctors= Doctor::all();
        return view('admin.doctors.notifaction',compact('doctors'));
    }

    public function doctor_Notifaction(Request $request)
    {
        // dd($request->doctorId);
        // dd($request->message);
        $length = count($request->device_token);
        if($length > 0)
        {
            for($i=0; $i<$length; $i++)
            {
                $SERVER_API_KEY = 'AAAA12iRXek:APA91bHSmMEKt_Vi3RamfrBtk5R6p6hN5w0qsj5NotG5Xa5ttX1TudSPZLHBiUEXV4jKQ6CZBb1Cm_142nJroxyVU-3LRfQUYyz2ainfRFqIOdf1srFSU5RTsIgcI1LT1TtWPNf5TwXZ';
                $token_1 = $request->device_token[$i];
                $message = $request->message;
                // if(isset($request->lang)  && $request ->lang == 'en' ){
                //     $message= $request->message;
                // }else{
                //     $message= $request->message;
                // }
                
                $data = [
                    "registration_ids" => [
                        $token_1
                    ],
                    "notification" => [
                        "title" => 'Espitalia',
                        "body" =>  $message,
                        "sound"=> "default" // required for sound on ios
                    ],
                ];

                $dataString = json_encode($data);
                $headers = [
                    'Authorization: key=' . $SERVER_API_KEY,
                    'Content-Type: application/json',
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                $response = curl_exec($ch);
                    
            }                      
        }
        return redirect()->back()->with("message","تم الإرسال");       
    }

    // public function store(Request $request)
    // {
        
    //     $this->validate( $request,[  
    //             'specialityId'=>'required',
    //             'specialityDesc_ar'=>'required',

    //             'specialityDesc_ar'=>'required',
    //             'countryId'=>'required',
    //             'cityId'=>'required',
    //             'longitude'=>'required',

    //             'latitude'=>'required',                         
    //             'first_name_ar'=>'required',
    //             'first_name_en'=>'required',
    //             'last_name_ar'=>'required',

    //             'last_name_en'=>'required',
    //             'email'=>'required',
    //             'password'=>'required',
    //             'mobile'=>'required',

    //             'address_ar'=>'required',
    //             'address_en'=>'required',
    //             'experience'=>'required',
    //             'gender'=>'required',

    //             'membershipNo'=>'required',
    //             'authority_ar'=>'required',
    //             'authority_en'=>'required',
    //             'degree_ar'=>'required',

    //             'degree_en'=>'required',
    //             'yearOfRegistration'=>'required',
    //             'bankNumber'=>'required',
    //             'photo' => 'required|max:10000|mimes:jpeg,jpg,png,gif|',
    //             // 'university_degree' => 'required|max:10000|mimes:pdf|',
    //             // 'practice_certificate' => 'required|max:10000|mimes:pdf|',
    //             // 'photo' => 'required|max:10000|mimes:jpeg,jpg,png,gif|',
    //         ],
    //         [
    //             'specialityDesc_ar.required'=>'ادخل وصف التخصص عربي',     
    //             'specialityDesc_en.required'=>'ادخل وصف التخصص انجليزي',

    //             'countryId.required'=>'اختر البلد',
    //             'cityId.required'=>'اختر المدينه',
    //             'longitude.required'=>'ادخل اللوكيشن',
    //             'latitude.required'=>'ادخل اللوكيشن',

    //             'first_name_ar.required'=>'يرجي ادخال الاسم الاول بالعربي',                
    //             'first_name_en.required'=>'يرجى ادخال الاسم الاول بالانجليزي ',
    //             'last_name_ar.required'=>'يرجي ادخال الثانى بالعربي ',
    //             'last_name_en.required'=>' يرجى ادخال الاسم الثاني بالانجليزي',


    //             'email.required'=>'البريد الالكتروني مطلوب ',
    //             'password.required'=>'يرجى ادخال كلمة المرور ',
    //             'mobile.required'=>' الموبايل مطلوب',
    //             'address_ar.required'=>'العنوان عربي مطلوب',

    //             'address_en.required'=>' العنوان انجليزي مطلوب',
    //             'experience.required'=>' يرجى ادخال عدد سنوات الخبرة',
    //             'gender.required'=>'ادخل النوع',
    //             'membershipNo.required'=>'ادخل رقم العضويه',

    //             'authority_ar.required'=>'ادخل جهة العمل عربي',
    //             'authority_en.required'=>'ادخل جهة العمل انجليزي',
    //             'degree_ar.required'=>'ادخل الدرجه العلمية عربي',
    //             'degree_en.required'=>'ادخل الدرجة العمية انجليزي',

    //             'yearOfRegistration.required'=>'سنة التتسجيل',
    //             'bankNumber.required'=>'اكتب رقم الحساب البنكي',
    //             'specialityId.required'=>'يرجى اختيار تخصص ',
    //             'photo.required'=>' يرجي إختيار صروة jpeg,jpg,png,gif ',
    //             // 'university_degree.required'=>' يرجي إختيار ملف pdf ',
    //             // 'practice_certificate.required'=>' يرجي إختيار ملف pdf',

    //         ]
    //     );
    //      $checkemail = Doctor::where("email" , $request->email)->first();
    //     if($checkemail){
    //         if(isset($request->lang)  && $request -> lang == 'en' ){
    //             return $this -> returnError('001','Email already exists');
    //         }else{
    //             return $this -> returnError('001','البريد الإلكتروني موجود مسبقا');
    //         }
    //     }else{
    //     $add = new Doctor();
    //      if($file=$request->file('photo'))
    //      {
    //         $file_extension = $request -> file('photo') -> getClientOriginalExtension();
    //         $file_name = time().'.'.$file_extension;
    //         $file_nameone = $file_name;
    //         $path = 'assets_admin/img/doctors/photo';
    //         $request-> file('photo') ->move($path,$file_name);
    //         $add->photo  = $file_nameone;
    //      }else{
    //         $add->photo  = "profile_image.png"; 
    //      }
        
    //     $add->specialityDesc_ar  = $request->specialityDesc_ar;
    //     $add->specialityDesc_en  = $request->specialityDesc_en;

    //     $add->countryId  = $request->countryId;
    //     $add->cityId  = $request->cityId;
    //     $add->longitude  = $request->longitude;
    //     $add->latitude  = $request->latitude;

    //     $add->first_name_ar  = $request->first_name_ar; 
    //     $add->last_name_ar  = $request->last_name_ar; 
    //     $add->first_name_en  = $request->first_name_en; 
    //     $add->last_name_en  = $request->last_name_en; 


    //     $add->email  = $request->email;   
    //     $add->password  = bcrypt($request->password);  
    //     $add->mobile  = $request->mobile;
    //     $add->address_ar  = $request->address_ar;

    //     $add->address_en  = $request->address_en;
    //     $add->experience  = $request->experience;
    //     $add->gender  = $request->gender;
    //     $add->membershipNo  = $request->membershipNo;

    //     $add->authority_ar  = $request->authority_ar;
    //     $add->authority_en  = $request->authority_en;
    //     $add->degree_ar  = $request->degree_ar;
    //     $add->degree_en  = $request->degree_en;

    //     $add->yearOfRegistration  = $request->yearOfRegistration;
    //     $add->bankNumber  = $request->bankNumber;
    //     $add->specialityId  = $request->specialityId;         
    //     $add-> save();




    //       $user = $add->toArray();
    //         $user['link'] = Str::random(32);
    //         DB::table('user_activations')->insert(['id_user'=>$user['id'],'token'=>$user['link']]);
    //         Mail::send('emails.doctor-activation', $user, function($message) use ($user){
    //             $message->to($user['email']);
    //             $message->subject('esptaila - Activation Code');
    //         });

    //         $video=[
    //             'doctorId' => $add->id,
    //             'services_name_ar'  => "استشارة فيديو",
    //             'services_name_en'  => "Video consulting",
    //             'price'  => 3,
    //             'icon' => 'video.jpeg',
    //             'type'  => "Video",
    //         ];
    //         $reavel=[
    //             'doctorId' => $add->id,
    //             'services_name_ar'  => "كشف ف العيادة",
    //             'services_name_en'  => "Examination in the clinic",
    //             'price'  => 3,
    //             'icon' => 'reavl.png',
    //             'type'  => "reavel",
    //         ];   
    //         $serv1 = Service::create($video);
    //         $serv2 = Service::create($reavel);

    //     return redirect()->back()->with("message",'تم تسجيل طبيب جديد بنجاح');
    //     } 
    // }
   

    // public function edit(Doctor $doctor)
    // {
    //     $specialities=Speciality::all();
    //     $countries=Country::all();
    //     $cities=City::all();
    //     return view('admin.doctors.edit',compact('doctor','specialities','countries','cities'));
    // }

    

    
 


}
