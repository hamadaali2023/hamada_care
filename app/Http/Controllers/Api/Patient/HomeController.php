<?php

namespace App\Http\Controllers\Api\Patient;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Banner;
use App\Article;
use App\Doctor;
use App\Patient;
use App\Slider;
use App\Speciality;
use App\Service;
use App\Offer;
use App\Language;
use App\Appointment;
use App\ContactInfo;
use App\Favorite;
use App\Reviews;
use Carbon\Carbon;
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
use Illuminate\Support\Facades\DB;
use Auth;
use App\City;
use App\Country;
use App\Diagnostic;
use DateTime;

use App\Transaction;
use App\Wallet;
class HomeController extends Controller   
{  
    use GeneralTrait; 
    public function index(Request $request ,$radius = 400)
    {
        // dd('ghjk');
        // $gg= Auth::guard('patient-api')->user();
        // dd($gg);
        $pannars=Banner::all();
        $sliders = Slider::selection()->get();

        $latitude       =  $request->latitude;
        $longitude      =  $request->longitude;

        // $doctors          =       DB::table("doctors");
        $doctors          =       Doctor::select(
            'id',
            'specialityId',
            'specialityDesc_' . app()->getLocale() . ' as specialityDesc',
            'countryId',
            'cityId',
            'first_name_' . app()->getLocale() . ' as first_name',
            'last_name_' . app()->getLocale() . ' as last_name',
            'email',
            'mobile',
            'bankNumber',
            'address_' . app()->getLocale() . ' as address',
            'longitude',
            'latitude',
            'experience',
            'gender',
            'photo',
            'university_degree',
            'practice_certificate',
            'other_qualification',
            'rate',
            'status',
            'token',
            'membershipNo',
            'specialityDesc_' . app()->getLocale() . ' as specialityDesc',
            'authority_' . app()->getLocale() . ' as authority',
            'degree_' . app()->getLocale() . ' as degree',
            'yearOfRegistration',
            'device_token',
            'created_at',
            'updated_at', 
            DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                + sin(radians(" .$latitude. ")) * sin(radians(latitude))) AS distance"));
        $doctors          =       $doctors->having('distance', '<', 20);
        $doctors          =       $doctors->orderBy('distance', 'asc');
        $doctors          =       $doctors->where('status',1)->get();
        
        // $doctors = Doctor::selection()->get();
        foreach ($doctors as $item) {
            $item->specialityName= Speciality::selection()->where('id',$item->specialityId)->first();   
            $item->serviceName= Service::selection()->where('doctorId',$item->id)->where('status',1)->get(); 
            $item->countries= Country::selection()->where('id',$item->countryId)->first();
            $item->cities= City::selection()->where('id',$item->cityId)->first();
            $working_days = WorkingDays::where('doctorId',$item->id)->first();
            $favorite = Favorite::where('doctorId',$item->id)->where('patientId',$request->patientId)->first();
            
            if($favorite ==null)
            {
                $item->favorite=0;
            }else{
             $item->favorite= 1;    
            }
            
            if($working_days ==null)
            {
                $item->duration="";
            }else{
             $item->duration= $working_days->duration;    
            }
               
        }


        $offers = Offer::selection()->orderBy('id', 'DESC')->get();
        foreach ($offers as $item) {
            $item->doctor= Doctor::selection()->where('id',$item->doctorId)->first();   
        }
        // dd($doctors);
        
        $specialities = Speciality::selection()->orderBy('id', 'DESC')->get();
        $articles = Article::selection()->get();
        $home  = [  
                    'specialities'=>$specialities,
                    'doctors'=>$doctors,
                    'offers'=>$offers,
                    'sliders'=>$sliders,
                    'pannars'=>$pannars,
                    'articles'=>$articles,                    
                ];
        return $this -> returnData(
            'home',$home
        );
    }
    
    public function addRate(Request $request)
    {
            $add = new Reviews;
            $add->doctorId = $request->doctorId;
            $add->patientId = $request->patientId;
            $add->comment = $request->comment;
            $add->rate = $request->rate;
            $add->save();
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnSuccessMessage('added Successfully ');
            }else{
                return $this -> returnSuccessMessage('تم الاضافة بنجاح');
            } 
    }
    
    public function patientLocation(Request $request)
    {
            $add = new Patient_location;
            $add->patientId = $request->patientId;
            $add->countryId = $request->countryId;
            $add->cityId = $request->cityId;
            $add->location_name = $request->location_name;
            $add->state = $request->state;
            $add->street = $request->street;
            $add->building_name = $request->building_name;
            $add->longitude = $request->longitude;
            $add->latitude = $request->latitude;
            $add->floor_number = $request->floor_number;
            $add->save();
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnSuccessMessage('added Successfully ');
            }else{
                return $this -> returnSuccessMessage('تم الاضافة بنجاح');
            } 
    }
    public function patient_people_under_care(Request $request)
    {
        $edit = new People_under_care();
        
            $edit->patientId  = $request->patientId; 
            $edit->name  = $request->name; 
         
            $edit->age  = $request->age;  
        
            $edit->years  = $request->years;  
        
            $edit->gender  = $request->gender;  
         

            $edit->mobile  = $request->mobile;  
         
         
            $edit->relationship  = $request->relationship;  
         
            $edit->blood  = $request->blood;  
            $edit->weight  = $request->weight;  
            $edit->height  = $request->height;  
            $edit->pressure  = $request->pressure;  
            $edit->chronic  = $request->chronic;   
            
            $edit->companies_insuranceId  = $request->companies_insuranceId;  
            $edit->number  = $request->number;  
            $edit->type  = $request->type;  
            $edit->date  = $request->date;
            $edit-> save();
            $companies_insurance = Companies_insurance::where('id',$edit->companies_insuranceId)->first();
            // dd($companies_insurance);
            if($companies_insurance){
                $edit->companies_insuranceId=$companies_insurance->name_ar;
            }
            // else{
            //     $edit->companies_insuranceId='';
            // }
            
            ///////////
            
            
                     
         
        // health information

        
        if(isset($request->lang)  && $request -> lang == 'en' ){
            return $this -> returnDataa('data',$edit,'done');
        }else{
            return $this -> returnDataa('data',$edit,'تم الحفظ');
        }  
    }
    
    public function getPeopleUnderCare(Request $request)
    {
        $data=People_under_care::where('patientId',$request->patientId)->get();
        return $this -> returnData(
            'data',$data
        );
    }
    public function removeUnderCare(Request $request){
        $people_under_care = People_under_care::find($request->id);
        if($people_under_care)
        $people_under_care->delete(); 
        if(isset($request->lang)  && $request -> lang == 'en' ){
            return $this -> returnSuccessMessage('Deleted Successfully');
        }else{
            return $this -> returnSuccessMessage('تم الحذف بنجاح');
        }
    }
    
    
    public function removePatientLocation(Request $request)
    {
        $patient_location = Patient_location::find($request->id);
        $patient_location->delete(); 
        if(isset($request->lang)  && $request -> lang == 'en' ){
            return $this -> returnSuccessMessage('Deleted Successfully');
        }else{
            return $this -> returnSuccessMessage('تم الحذف بنجاح');
        }
    }
    public function getPatientLocation(Request $request)
    {
        $data=Patient_location::where('patientId',$request->patientId)->get();
        foreach ($data as $item) {
            $country= Country::selection()->where('id',$item->countryId)->first();
            if($country){
                $item->country=$country->name;
            }else{
                $item->country=null;
            }
            
            $city= City::selection()->where('id',$item->cityId)->first();
            if($city){
                $item->city=$city->name;
            }else{
                $item->city=null;
            }
        }    
        
            
        
        return $this -> returnData(
            'data',$data
        );
    }
    
    public function paymentStatus(Request $request)
    {
            $edit = Patient::findOrFail($request->patientId);
            $edit->payment_method  = $request->payment_method;
            $edit->save();
            
            
            
            
            
            
            
            $patient = Patient::find($edit->id);
            $patient->photo= "https://findfamily.net/care/assets_admin/img/patient/".$patient->photo;
    
            $patient->patient_health_information = Patient_health_information::where('patientId',$patient->id)->first();
            $country= Country::selection()->where('id',$patient->countryId)->first();
            if($country){
                $patient->country=$country->name;
            }else{
                $patient->country=null;
            }
            $city= City::selection()->where('id',$patient->cityId)->first();
            if($city){
                $patient->city=$city->name;
            }else{
                $patient->city=null;
            }
            
            $patient_case =  Patient_case::where('patientId',$patient->id)->first();
            if($patient_case){
                $patient->patient_not_status=$patient_case->status_not;
            }else{
                $patient->patient_not_status=1;
            }
           
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnDataa('data',$patient,'done');
            }else{
                return $this -> returnDataa('data',$patient,'تم الحفظ');
            } 
            
    }
    
    //  Order
    // Order_image
    // public function createOrder(Request $request)
    // {
    //     // dd('fdvfd');
    //         $add = new Order;
    //         $add->patientId = $request->patientId;
    //         $add->doctorId = $request->doctorId;
    //         $add->categoryId = $request->categoryId;
    //         // $add->subCategoryId = $request->subCategoryId;
    //         $add->patientlocationId = $request->patientlocationId;
    //         $add->message = $request->message;
    //         $add->gender = $request->gender;
    //         $add->age = $request->age;
    //         $add->language = $request->language;
    //         $add->mobile = $request->mobile;
    //         $add->date = $request->date;
    //         $add->time = $request->time;
    //         $add->method_payment = $request->method_payment;
    //         $add->duration = $request->duration;
            
    //         $add->save();
    //         $length_subCategoryId = count($request->subCategoryId);
    //         if($length_subCategoryId > 0)
    //         {
    //             for($i=0; $i<$length_subCategoryId; $i++)
    //             {
    //                 $order_sub_category= new Order_sub_category;
    //                 $order_sub_category->orderId  = $add->id;                   
    //                 $order_sub_category->subCategoryId  = $request->subCategoryId[$i];                   
    //                 $order_sub_category->save();
    //             }
    //         }
    //         // dd('verver');
            
    //         if($request->hasfile('image'))
    //         {
    //             foreach($request->file('image') as $item)
    //             {
    //                 $file_extension = $item -> getClientOriginalExtension();
    //                 $file_name = time().rand(1,100).'.'.$file_extension;
    //                 $item->move('assets_admin/img/orders/', $file_name);
    //                 $data[] = $file_name; 
    //             }
                
    //             $length_file = count($data);
    //             if($length_file > 0)
    //             {
    //                 for($i=0; $i<$length_file; $i++)
    //                 {
                        
    //                     $add_order_image= new Order_image;
    //                     $add_order_image->orderId  = $add->id;
    //                     $add_order_image->image  = $data[$i];                   
    //                     $add_order_image->save();
    //                 }
    //             }
    //         }
            
            
              
            
    //         if(isset($request->lang)  && $request -> lang == 'en' ){
    //             return $this -> returnSuccessMessage('added Successfully ');
    //         }else{
    //             return $this -> returnSuccessMessage('تم الاضافة بنجاح');
    //         } 
    // }
    
    public function createOrder(Request $request)
    {
             
            $add = new Order;
            $add->patientId = $request->patientId;
            $add->doctorId = $request->doctorId;
            $add->patientUnderCareId = $request->patientUnderCareId;
            $add->categoryId = $request->categoryId;
            $add->patientlocationId = $request->patientlocationId;
            $add->message = $request->message;
            $add->gender = $request->gender;
            $add->age = $request->age;
            $add->language = $request->language;
            $add->mobile = $request->mobile;
            $add->date = $request->date;
            $add->time = $request->time;
            if($request->method_payment ==1){
                $add->method_payment = 1;
            }elseif($request->method_payment ==2){
                $add->method_payment = 1;
            }else{
                $add->method_payment=  0;
            }
            $add->save();
            
           
            $service_total_price=0;
            $product_total_price=0;
            
            if($request->type ==0){
                // if is zero it is normal service
                $length_subCategoryId = count($request->subCategoryId);
                if($length_subCategoryId > 0)
                {
                    for($i=0; $i<$length_subCategoryId; $i++)
                    {
                        if($request->doctorId !=null){
                            $service_total_price += Doctor_service::where('doctorId',$request->doctorId)
                                                                ->where('subCategoryId',$request->subCategoryId[$i])->sum('price');
                        }else{
                            $service_total_price += SubCategory::where('id',$request->subCategoryId[$i])->sum('price');
                        }                                        
                        $order_sub_category= new Order_sub_category;
                        $order_sub_category->orderId  = $add->id;                   
                        $order_sub_category->subCategoryId  = $request->subCategoryId[$i];
                        $order_sub_category->duration  = $request->duration[$i];
                        $order_sub_category->save();
                    }
                }
                if($request->method_payment=2){
                    // if method_payment = 2  pay with wallet
                    $patient_wallet=Wallet::where('patientId',$request->patientId)->first();
                    
                    
                    if($patient_wallet->total > $product_total_price){
                        // if balance of patientId bigger than order_price
                        $patient_wallet->total  = $patient_wallet->total - $service_total_price; 
                        $patient_wallet->save();
                        if($request->doctorId !=null){
                            // if the patient choosed doctor
                            $p_transaction = new Transaction;
                            $p_transaction->walletId = $patient_wallet->id;
                            $p_transaction->transferFrom = $request->patientId;
                            $p_transaction->transferTo = $request->doctorId;
                            $p_transaction->value = $service_total_price;
                            $p_transaction->type= 'دفع';
                            $p_transaction->save();
                            
                            $doctor_wallet=Wallet::where('doctorId',$request->doctorId)->first();
                            $doctor_wallet->total  = $doctor_wallet->total + $service_total_price; 
                            $doctor_wallet->save();
                            
                            $d_transaction = new Transaction;
                            $d_transaction->walletId = $doctor_wallet->id;
                            $d_transaction->transferFrom = $request->patientId;
                            $d_transaction->transferTo = $request->doctorId;
                            $d_transaction->value = $service_total_price;
                            $d_transaction->type= 'دفع';
                            $d_transaction->save();
                        }else{
                            $p_transaction = new Transaction;
                            $p_transaction->walletId = $patient_wallet->id;
                            $p_transaction->transferFrom = $request->patientId;
                            $p_transaction->transferTo = "total health";
                            $p_transaction->value = $service_total_price;
                            $p_transaction->type= 'دفع';
                            $p_transaction->save();
                            
                            $user_wallet=Wallet::where('userId',1)->first();
                            $user_wallet->total  = $user_wallet->total + $service_total_price; 
                            $user_wallet->save();    
                            
                            $u_transaction = new Transaction;
                            $u_transaction->walletId = $user_wallet->id;
                            $u_transaction->transferFrom = $request->patientId;
                            $u_transaction->transferTo = "total health";
                            $u_transaction->value = $service_total_price;
                            $u_transaction->type= 'دفع';
                            $u_transaction->save();
                        }
                        
                    }else{
                        return $this -> returnError('404','الرصيد غير كافي');
                    }
                    
                }
                
                
                if($request->hasfile('image'))
                {
                    foreach($request->file('image') as $item)
                    {
                        $file_extension = $item -> getClientOriginalExtension();
                        $file_name = time().rand(1,100).'.'.$file_extension;
                        $item->move('assets_admin/img/orders/', $file_name);
                        $data[] = $file_name; 
                    }
                    
                    $length_file = count($data);
                    if($length_file > 0)
                    {
                        for($i=0; $i<$length_file; $i++)
                        {
                            
                            $add_order_image= new Order_image;
                            $add_order_image->orderId  = $add->id;
                            $add_order_image->image  = $data[$i];                   
                            $add_order_image->save();
                        }
                    }
                }
                
            }else{
                // if category type =1 it is buy
                $length_orderProductId = count($request->orderProductId);
                if($length_orderProductId > 0)
                {
                    for($i=0; $i<$length_orderProductId; $i++)
                    {
                        $product_total_price += Product::where('id',$request->orderProductId[$i])->sum('price');
                        
                        $order_product= new Order_product;
                        $order_product->orderId  = $add->id;                   
                        $order_product->orderProductId  = $request->orderProductId[$i];                   
                        $order_product->save();
                    }
                }
                
                if($request->method_payment==2){
                    // if method_payment = 2  pay by wallet
                    
                    $patient_wallet=Wallet::where('patientId',$request->patientId)->first();
                    if($patient_wallet->total > $product_total_price){
                        $patient_wallet->total  = $patient_wallet->total - $product_total_price ; 
                        $patient_wallet->save();
                        
                        
                        $p_transaction = new Transaction;
                        $p_transaction->walletId = $patient_wallet->id;
                        $p_transaction->transferFrom = $request->patientId;
                        $p_transaction->transferTo = "total health";
                        $p_transaction->value = $product_total_price;
                        $p_transaction->type= 'دفع';
                        $p_transaction->save();
                            
                        $user_wallet=Wallet::where('userId',1)->first();
                        // dd($user_wallet->total + $product_total_price);
                        $user_wallet->total  = $user_wallet->total + $product_total_price; 
                        $user_wallet->save();    
                            
                        $u_transaction = new Transaction;
                        $u_transaction->walletId = $user_wallet->id;
                        $u_transaction->transferFrom = $request->patientId;
                        $u_transaction->transferTo = "total health";
                        $u_transaction->value = $product_total_price;
                        $u_transaction->type= 'دفع';
                        $u_transaction->save();                    
                        
                        
                        
                        
                        
                    }else{
                        return $this -> returnError('404','الرصيد غير كافي');
                    }
                    
                }    
            }
               
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnSuccessMessage('added Successfully ');
            }else{
                return $this -> returnSuccessMessage('تم الاضافة بنجاح');
            } 
    }
    
    // public function getOrders(Request $request)
    // {
    //     $orders=Order::where('patientId',$request->patientId)->get();
    //     foreach($orders as $item){
    //         // $item->subcategory= SubCategory::where('id',$item->subCategoryId)->get();
    //         $item->category=Category::selection()->where('id',$item->categoryId)->first();
    //         $item->patient=Patient::where('id',$item->patientId)->first();
    //         $item->doctor=Doctor::where('id',$item->doctorId)->first();
            
    //     // subcategory
    //         $subcategory=[];
    //         $order_sub_category= Order_sub_category::where('orderId',$item->id)->get();
    //         foreach ($order_sub_category as $order_sub_category_item) {  
    //             $subcategory[]=SubCategory::selection()->where("id" , $order_sub_category_item->subCategoryId)->first();
    //             foreach ($subcategory as $subcategory_item) {  
    //                 $subcategory_item->duration=$order_sub_category_item->id;
    //             }    
                
    //         }
            
            
    //         $item->subcategory=$subcategory;
            
            
    //         $products=[];
    //         $order_product= Order_product::where('orderId',$item->id)->get();                     
    //         foreach ($order_product as $order_product_item) {  
    //             $products[]=Product::where("id" , $order_product_item->orderProductId)->first();
    //         }
    //         foreach ($products as $product_item) {
    //             $product_item->image="https://findfamily.net/care/assets_admin/img/products/".$product_item->image;
    //         }
    //         $item->products=$products;
            
    //     /// order Patient location    
    //         $patient_location=Patient_location::where('id',$item->patientlocationId)->get();
    //         foreach ($patient_location as $patient_location_item) {
    //             $country= Country::selection()->where('id',$patient_location_item->countryId)->first();
    //             if($country){
    //                 $patient_location_item->country=$country->name;
    //             }else{
    //                 $patient_location_item->country=null;
    //             }
                
    //             $city= City::selection()->where('id',$patient_location_item->cityId)->first();
    //             if($city){
    //                 $patient_location_item->city=$city->name;
    //             }else{
    //                 $patient_location_item->city=null;
    //             }
    //         }    
    //         $item->patient_location=$patient_location;
            
    //     /// order people_under_care    
    //         $item->people_under_care=People_under_care::where('id',$item->patientUnderCareId)->first();
            
            
    //     /// order image    
    //         $item->order_image=Order_image::where('orderId',$item->id)->get();
              
            
    //     }
    //     return $this -> returnData(
    //         'data',$orders
    //     );
    // }
    
    
    public function getDoctorsBlockedFavoritesAllByService(Request $request) {
        
        $doctors_activation = Doctor_activation::where('active',1)->first();
        $doctor_blocked=[];
        $doctor_favorites=[];
        $doctor_by_service=[];
        
        if($doctors_activation){
        //////////////////////////
           
            $doctor_blocked=[];
            $blocked= Block::where('patientId',$request->patientId)
                                ->with(array('doctors'=>function($query){
                                    $query;
                                }))->get(); 
                                
            foreach ($blocked as $blocked_item) {  
                $doctor_blocked[]=Doctor::where("id" , $blocked_item->doctorId)->first();
            }
            
            
            
            foreach($doctor_blocked as $item)
            {
                $item->doctor = Doctor::where('id',$item->id)->first();
                
                $doctor = Doctor::where('id',$item->id)->first();
                    $doctor->photo= "https://findfamily.net/care/assets_admin/img/doctors/photo/".$doctor->photo;
                    $doctor->personality_photo="https://findfamily.net/care/assets_admin/img/doctors/photo/".$doctor->personality_photo;
                    $item->doctor = $doctor;
                $item->doctor_bank = Doctor_bank::where('doctorId',$item->id)->first();  
                $item->doctor_education =  Doctor_education::where('doctorId',$item->id)->get();
                $item->doctor_insurance =  Doctor_insurance::where('doctorId',$item->id)->get();
                $doctor_language =  Doctor_language::where('doctorId',$item->id)->get();
                foreach($doctor_language as $language_item)
                {
                    $language=Language::selection()->where('id',$language_item->languageId)->first();
                    $language_item->name = $language->name;
                }
                $item->doctor_language = $doctor_language; 
                
                $item->doctor_experience =  Doctor_experience::where('doctorId',$item->id)->get();
                $item->doctor_license =   Doctor_license::where('doctorId',$item->id)->first();
                $item->member_ship_types = Member_ship_type::where('id',$item->membershipTypeId)->first(); 
                $item->countries= Country::selection()->where('id',$item->countryId)->first();
                $item->cities= City::selection()->where('id',$item->cityId)->first();
                $doctor_case= Doctor_case::where('doctorId',$item->id)->first();
                // $item->doctor_not_status=$doctor_case->status_not;
                // $item->doctor_servic_status=$doctor_case->status_servic;
                if($doctor_case){
                        $item->doctor_not_status=$doctor_case->status_not;
                        $item->doctor_servic_status=$doctor_case->status_servic;
                    }else{
                        $item->doctor_not_status=1;
                        $item->doctor_servic_status=1;
                    }
                $blocked= Block::where('patientId',$request->patientId)->where('doctorId',$item->id)->first();
                    if($blocked){
                        $item->blocked_find=1;
                    }else{
                        $item->blocked_find=0;
                    }
                    
                    $favorites= Favorite::where('patientId',$request->patientId)->where('doctorId',$item->id)->first();
                    if($favorites){
                        $item->favorites_find=1;
                    }else{
                        $item->favorites_find=0;
                    }
                
            }
        ///////////////////////    
            
            $doctor_favorites=[];
            $favorites= Favorite::where('patientId',$request->patientId)
                                ->with(array('doctors'=>function($query){
                                    $query;
                                }))->get(); 
                                
            foreach ($favorites as $favorites_item) {  
                $doctor_favorites[]=Doctor::where("id" , $favorites_item->doctorId)->first();
            }
            
            
            foreach($doctor_favorites as $_items)
            {
                $doctor = Doctor::where('id',$_items->id)->first();
                    $doctor->photo= "https://findfamily.net/care/assets_admin/img/doctors/photo/".$doctor->photo;
                    $doctor->personality_photo="https://findfamily.net/care/assets_admin/img/doctors/photo/".$doctor->personality_photo;
                    $_items->doctor = $doctor;
                $_items->doctor_bank = Doctor_bank::where('doctorId',$_items->id)->first();  
                $_items->doctor_education =  Doctor_education::where('doctorId',$_items->id)->get();
                $_items->doctor_insurance =  Doctor_insurance::where('doctorId',$_items->id)->get();
                
                
                $doctor_language =  Doctor_language::where('doctorId',$_items->id)->get();
                foreach($doctor_language as $language_item)
                {
                    $language=Language::selection()->where('id',$language_item->languageId)->first();
                    $language_item->name = $language->name;
                }
                $_items->doctor_language = $doctor_language; 
                $_items->doctor_experience =  Doctor_experience::where('doctorId',$_items->id)->get();
                $_items->doctor_license =   Doctor_license::where('doctorId',$_items->id)->first();
                $_items->member_ship_types = Member_ship_type::where('id',$_items->membershipTypeId)->first(); 
                $_items->countries= Country::selection()->where('id',$_items->countryId)->first();
                $_items->cities= City::selection()->where('id',$_items->cityId)->first();
                $doctor_case= Doctor_case::where('doctorId',$_items->id)->first();
                // $_items->doctor_not_status=$doctor_case->status_not;
                // $_items->doctor_servic_status=$doctor_case->status_servic;
                if($doctor_case){
                    $_items->doctor_not_status=$doctor_case->status_not;
                    $_items->doctor_servic_status=$doctor_case->status_servic;
                }else{
                    $_items->doctor_not_status=1;
                    $_items->doctor_servic_status=1;
                }
                
                $blocked= Block::where('patientId',$request->patientId)->where('doctorId',$_items->id)->first();
                    if($blocked){
                        $_items->blocked_find=1;
                    }else{
                        $_items->blocked_find=0;
                    }
                    
                    $favorites= Favorite::where('patientId',$request->patientId)->where('doctorId',$_items->id)->first();
                    if($favorites){
                        $_items->favorites_find=1;
                    }else{
                        $_items->favorites_find=0;
                    }
            }
        ////////////////////////////   
            
            if($request->categoryId){
                // $doctor_service = Doctor_service::where('categoryId',$request->categoryId)->get();
                // foreach($doctor_service as $service_item)
                // {
                //     $doctor_by_service= Doctor::where('id',$service_item->doctorId)->get();
                // }
                
                
                $doctor_by_service=[];
                $doctor_service= Doctor_service::where('categoryId',$request->categoryId)
                                    ->with(array('doctors'=>function($query){
                                        $query;
                                    }))->get(); 
                                    
                foreach ($doctor_service as $service_item) {  
                    $doctor_by_service[]=Doctor::where("id" , $service_item->doctorId)->first();
                }
                
                
                
                // dd($doctor_service);
                foreach($doctor_by_service as $_item)
                {
                    $doctor = Doctor::where('id',$_item->id)->first();
                    $doctor->photo= "https://findfamily.net/care/assets_admin/img/doctors/photo/".$doctor->photo;
                    $doctor->personality_photo="https://findfamily.net/care/assets_admin/img/doctors/photo/".$doctor->personality_photo;
                    $_item->doctor = $doctor;
                    $_item->doctor_bank = Doctor_bank::where('doctorId',$_item->id)->first();  
                    $_item->doctor_education =  Doctor_education::where('doctorId',$_item->id)->get();
                    $_item->doctor_insurance =  Doctor_insurance::where('doctorId',$_item->id)->get();
                    
                    $doctor_language =  Doctor_language::where('doctorId',$_item->id)->get();
                    foreach($doctor_language as $language_item)
                    {
                        $language=Language::selection()->where('id',$language_item->languageId)->first();
                        $language_item->name = $language->name;
                    }
                    $_item->doctor_language = $doctor_language; 
                    $_item->doctor_experience =  Doctor_experience::where('doctorId',$_item->id)->get();
                    $_item->doctor_license =   Doctor_license::where('doctorId',$_item->id)->first();
                    $_item->member_ship_types = Member_ship_type::where('id',$_item->membershipTypeId)->first(); 
                    $_item->countries= Country::selection()->where('id',$_item->countryId)->first();
                    $_item->cities= City::selection()->where('id',$_item->cityId)->first();
                    $doctor_case= Doctor_case::where('doctorId',$_item->id)->first();
                    if($doctor_case){
                        $_item->doctor_not_status=$doctor_case->status_not;
                        $_item->doctor_servic_status=$doctor_case->status_servic;
                    }else{
                        $_item->doctor_not_status=0;
                        $_item->doctor_servic_status=0;
                    }
                    
                    $blocked= Block::where('patientId',$request->patientId)->where('doctorId',$_item->id)->first();
                    if($blocked){
                        $_item->blocked_find=1;
                    }else{
                        $_item->blocked_find=0;
                    }
                    
                    $favorites= Favorite::where('patientId',$request->patientId)->where('doctorId',$_item->id)->first();
                    if($favorites){
                        $_item->favorites_find=1;
                    }else{
                        $_item->favorites_find=0;
                    }
                }
            }else{
               // هنا هجيب الدكاتره الاكثر تقييما وسوف يتم تعديل السطر التالي
                $doctor_by_service= Doctor::get();
                
                foreach($doctor_by_service as $_item)
                {
                    $doctor = Doctor::where('id',$_item->id)->first();
                    $doctor->photo= "https://findfamily.net/care/assets_admin/img/doctors/photo/".$doctor->photo;
                    $doctor->personality_photo="https://findfamily.net/care/assets_admin/img/doctors/photo/".$doctor->personality_photo;
                    $_item->doctor = $doctor;
                    
                    
                    $_item->doctor_bank = Doctor_bank::where('doctorId',$_item->id)->first();  
                    $_item->doctor_education =  Doctor_education::where('doctorId',$_item->id)->get();
                    $_item->doctor_insurance =  Doctor_insurance::where('doctorId',$_item->id)->get();
                    
                    $doctor_language =  Doctor_language::where('doctorId',$_item->id)->get();
                    foreach($doctor_language as $language_item)
                    {
                        $language=Language::selection()->where('id',$language_item->languageId)->first();
                        $language_item->name = $language->name;
                    }
                    $_item->doctor_language = $doctor_language; 
                    
                    $_item->doctor_experience =  Doctor_experience::where('doctorId',$_item->id)->get();
                    $_item->doctor_license =   Doctor_license::where('doctorId',$_item->id)->first();
                    $_item->member_ship_types = Member_ship_type::where('id',$_item->membershipTypeId)->first(); 
                    $_item->countries= Country::selection()->where('id',$_item->countryId)->first();
                    $_item->cities= City::selection()->where('id',$_item->cityId)->first();
                    $doctor_case= Doctor_case::where('doctorId',$_item->id)->first();
                    
                    if($doctor_case){
                        $_item->doctor_not_status=$doctor_case->status_not;
                        $_item->doctor_servic_status=$doctor_case->status_servic;
                    }else{
                        $_item->doctor_not_status=1;
                        $_item->doctor_servic_status=1;
                    }
                    
                    $blocked= Block::where('patientId',$request->patientId)->where('doctorId',$_item->id)->first();
                    if($blocked){
                        $_item->blocked_find=1;
                    }else{
                        $_item->blocked_find=0;
                    }
                    
                    $favorites= Favorite::where('patientId',$request->patientId)->where('doctorId',$_item->id)->first();
                    if($favorites){
                        $_item->favorites_find=1;
                    }else{
                        $_item->favorites_find=0;
                    }
                    
                }
            }
        }
        
        $home  = [  
            'doctor_blocked'=>$doctor_blocked,
            'doctor_favorites'=>$doctor_favorites,
            'doctor_by_service'=>$doctor_by_service,
        ];
    
        return $this -> returnDataa(
            'data',$home,'fihrwfr'
        );
        
    }
    public function addToFavorite(Request $request)
    {
        $favorite=Favorite::where('doctorId',$request->doctorId)->where('patientId',$request->patientId)->first();
        if($favorite){
            $cats = Favorite::find($favorite->id);
            $cats->delete();
             if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnSuccessMessage('Updated Successfully');
            }else{
                return $this -> returnSuccessMessage('تم الحذف');
            } 
        }else{
            $add = new Favorite;
            $add->doctorId = $request->doctorId;
            $add->patientId = $request->patientId;
            $add->save();
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnSuccessMessage('added Successfully');
            }else{
                return $this -> returnSuccessMessage('تم الاضافة بنجاح');
            }
        }
    }
    
    public function addToBlocks(Request $request)
    {
        $blocked=Block::where('doctorId',$request->doctorId)->where('patientId',$request->patientId)->first();
        if($blocked){
            $cats = Block::find($blocked->id);
            $cats->delete();
             if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnSuccessMessage('Updated Successfully');
            }else{
                return $this -> returnSuccessMessage('تم الحذف');
            } 
        }else{
            $add = new Block;
            $add->doctorId = $request->doctorId;
            $add->patientId = $request->patientId;
            $add->save();
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnSuccessMessage('added Successfully');
            }else{
                return $this -> returnSuccessMessage('تم الاضافة بنجاح');
            }
        }
    }
    ///// wallets
    public function walletCharge(Request $request)
    {
            $patient_wallet=Wallet::where('patientId',$request->patientId)->first();
            $patient_wallet->total  = $patient_wallet->total + $service_total_price; 
            $patient_wallet->save();
            
            $add = new Transaction;
            $add->walletId = $request->walletId;
            $add->type = "شحن";
            $add->value = $request->value;
            // $add->report = $request->report;
            // $add->date = $request->date;
            // $add->time = $request->time;
            $add->save();
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnSuccessMessage('added Successfully ');
            }else{
                return $this -> returnSuccessMessage('تم الشحن بنجاح');
            } 
    }
    
    
    
    // public function walletTransfer(Request $request)
    // {
    //     $add = new Transaction;
    //     $add->walletId = $request->walletId;
    //     $add->transferFrom = $request->transferFrom;
    //     $add->transferTo = $request->transferTo;
    //     $add->value = $request->value;
    //     // $add->date = $request->date;
    //     // $add->time = $request->time;
    //     // $add->report = $request->report;
        
    //     $add->save();
    //     if(isset($request->lang)  && $request -> lang == 'en' ){
    //         return $this -> returnSuccessMessage('added Successfully ');
    //     }else{
    //         return $this -> returnSuccessMessage('تم الاضافة بنجاح');
    //     } 
    // }
    
    
    
    
    // public function getProduct(Request $request){
    //     $patient_case =  Patient_case::
    // }
    
    
    public function getBalanceTransaction(Request $request)
    {
        
        $patient_wallet = Wallet::where('patientId',$request->patientId)->first();
        $wallet_payment_total = Transaction::where('walletId',$patient_wallet->id)
                                                        ->where('type','دفع')
                                                        ->sum('value');
        $alltransaction = Transaction::where('walletId',$patient_wallet->id)
                                                        ->get();
        $alltransaction = Transaction::where('walletId',$patient_wallet->id)
                                                        ->get();                                                
                                                       
        $home  = [  
                'patient_wallet'=>$patient_wallet,
                'alltransaction'=>$alltransaction,
                'wallet_payment_total'=>$wallet_payment_total,
                'visa_payment_total'=>$wallet_payment_total,
                'cash_payment_total'=>$wallet_payment_total,
        ];
        return $this -> returnData(
            'data',$home
        );
    } 
    
    
    
    
    public function sliders()
    {
        $sliders = Slider::selection()->get();
        return $this -> returnData(
            'sliders',$sliders
        );
    }    
    public function getDoctorsSpecialityById(Request $request)
    {
        $category = Speciality::selection()->find($request->id);
        // if (!$category)
        //     return $this->returnError('001', 'هذا التخصص غير موجود');
        // $doctors = Doctor::selection()->get();
        // dd($category);
        $doctors= Doctor::selection()->where('status',1)->where('specialityId',$category->id)->get();       
        foreach ($doctors as $item) {
            $item->specialityName= Speciality::selection()->where('id',$item->specialityId)->first();  
            $item->serviceName= Service::selection()->where('doctorId',$item->id)->where('status',1)->get();
            $item->countries= Country::selection()->where('id',$item->countryId)->first();
            $item->cities= City::selection()->where('id',$item->cityId)->first();
            $favorite = Favorite::where('doctorId',$item->id)->where('patientId',$request->patientId)->first();
            if($favorite ==null)
            {
                $item->favorite=0;
            }else{
             $item->favorite= 1;    
            }
            
             $working_days = WorkingDays::where('doctorId',$item->id)->first();
            if($working_days ==null)
            {
                $item->duration="";
            }else{
             $item->duration= $working_days->duration;    
            }
            
        }
        return $this->returnData('doctors', $doctors);
    }

    // public function getTime(Request $request){
    //     // dd($request->date);
    //     $day = Carbon::createFromFormat('Y-m-d', $request->date)->dayOfWeek;
    //     //  dd($day);
    //     $times=DB::table('working_days')->where('day_number', $day)->where('doctorId', $request->doctorId)->get();
    //     // dd($times);
    //   foreach ($times as $item) {
    //         $start=strtotime($item->from_morning);
    //         $end=strtotime($item->to_morning);

    //         if($start){
    //             for ($i=$start;$i<=$end;$i = $i + 15*60)
    //             {
    //                 $item->first_time[]= date('g:i ',$i);
    //             }
    //         }else{
    //             $item->first_time[]= 'لا يوجد مواعيد صباحا';
    //         }    

    //         $start2=strtotime($item->from_afternoon);
    //         $end2=strtotime($item->to_afternoon);
    //         if($start2){
    //             for ($i=$start2;$i<=$end2;$i = $i + 15*60)
    //             {
    //                 $item->second_time[]= date('g:i ',$i);
    //             }
                 
    //         }else{
    //             $item->second_time[]= 'لا يوجد مواعيد بعد الظهر';
    //         }

    //         $start3=strtotime($item->from_evening);
    //         $end3=strtotime($item->to_evening);
    //         if($start3){
    //             for ($i=$start3;$i<=$end3;$i = $i + 15*60)
    //             {
    //                 $item->third_time[]= date('g:i ',$i);
    //             }
    //         }else{
    //             $item->third_time[]= 'لا يوجد مواعيد ف المساء';
    //         }
    
            
    //     }   
       
    //     return $this->returnData('times', $times); 
    // }
    public function getTime(Request $request){
        // dd($request->date);
        $day = Carbon::createFromFormat('Y-m-d', $request->date)->dayOfWeek;
        //   dd($day);
        $times=DB::table('working_days')->where('day_number', $day)->where('doctorId', $request->doctorId)->get();
        // dd($times);
        // $checktimefound=Appointment::where('date', $request->date)->where('doctorId', $request->doctorId)->get();
        $checktimefound=Appointment::where('date', $request->date)
                                    ->where('status',"confirmed")
                                    ->where('payment_status',1)
                                    ->get();
        // dd($checktimefound);
        
        foreach ($times as $item) {
            
            if($request->date >=$item->from_date){
                if( $request->date <= $item->to_date ){
                     $start=strtotime($item->from_morning);
                    $end=strtotime($item->to_morning);
        
                    if($start){
                        for ($i=$start;$i<=$end;$i = $i + $item->duration *60)
                        {
                            $first[]= date('g:i ',$i).'AM';
                            
                            $first_time  = [  
                                'alltime'=>$first,
                                'appointmentbooked'=>$checktimefound,
                            ];
                            $item->first_time=$first_time;
                        }
                    }else{
                        $item->first_time= null;
                    }  
                    $start2=strtotime($item->from_afternoon);
                    $end2=strtotime($item->to_afternoon);
                    if($start2){
                        for ($i=$start2;$i<=$end2;$i = $i +  $item->duration*60)
                        {
                            $second[]= date('g:i ',$i).'AF';
                            
                            $second_time  = [  
                                'alltime'=>$second,
                                'appointmentbooked'=>$checktimefound,
                            ];
                            $item->second_time=$second_time;
                        }
                         
                    }else{
                        $item->second_time= null;
                    }
        
                    $start3=strtotime($item->from_evening);
                    $end3=strtotime($item->to_evening);
                    if($start3){
                        for ($i=$start3;$i<=$end3;$i = $i +  $item->duration*60)
                        {
                            $third[]= date('g:i ',$i).'PM';
                            
                            $third_time  = [  
                                'alltime'=>$third,
                                'appointmentbooked'=>$checktimefound,
                            ];
                            $item->third_time=$third_time;
                        }
                    }else{
                        // $third1=[];
                        // $third2= [];
                        // $third_time  = [  
                        //     'alltime'=>$third1,
                        //     'appointmentbooked'=>$third2,
                        // ];
                        // $item->third_time= $third_time;
                        $item->third_time= null;
                    } 

                }else{
                    return $this->returnData('times', []); 
                }
            }else{
                return $this->returnData('times', []); 
            }
            
        }   
       
        return $this->returnData('times', $times); 
    }
    
    public function addBooking(Request $request)
    {      
        // if($request->patientId & $request->doctorId & $request->date & $request->time & $request->type != null){
        $appointments=Appointment::where('patientId',$request->patientId)
                                   ->where('doctorId',$request->doctorId)
                                   ->where('date',$request->date)
                                   ->where('status',"confirmed")
                                   ->where('payment_status',1)
                                   ->first();
        if($appointments){
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnError('You already have an appointment with this doctor ');
            }else{
                return $this -> returnError('لديك موعد سابق بالفعل مع هذا الدكتور');
            } 
        }else{
            $add = new Appointment;
            $add->patientId    = $request->patientId;
            $add->doctorId    = $request->doctorId;
            $add->date  = $request->date;
            if($request->permanent_type=='AM'){
                $add->time  = $request->time.' AM';
            }elseif($request->permanent_type=='AF'){
                $add->time  = $request->time.' AF';
            }else{
                $add->time  = $request->time.' PM';
            }
            $add->permanent_type  = $request->permanent_type;
            $add->type  = $request->type;
            $add->save();
                return $this->returnData('bookingid', $add->id); 
        }                           
            
            // }else{
            //     return $this -> returnSuccessMessage('يوجد داتا ناقصة');
            // }
            // $add = new Appointment;
            // $add->patientId    = $request->patientId;
            // $add->doctorId    = $request->doctorId;
            // $add->date  = $request->date;
            // $add->time  = $request->time;
            // $add->type  = $request->type;
            // $add->save();
            // return $this->returnData('bookingid', $add->id); 

            // return $this -> returnSuccessMessage('تم الحجز بنجاح');
    }


    public function addPayment(Request $request)
    {
            $todayDate = date("Y-m-d");
            $time = new DateTime();
            $time->modify('+3 hours');
             

            $add = new Payment;
            $add->doctorId    = $request->doctorId;
            $add->patientId    = $request->patientId;
            $add->appointmentId    = $request->appointmentId;
            $add->amount  = $request->amount;
            $add->type  = $request->type;
            $add->company  = $request->company;
            $add->name  = $request->name;
            $add->number  = $request->number;
            $add->cvc  = $request->cvc;
            $add->month  = $request->month;
            $add->year  = $request->year;
            $add->date  = $todayDate;
            $add->time  = $time->format("H:i");
            $add->save();
            
            $SERVER_API_KEY = 'AAAA12iRXek:APA91bHSmMEKt_Vi3RamfrBtk5R6p6hN5w0qsj5NotG5Xa5ttX1TudSPZLHBiUEXV4jKQ6CZBb1Cm_142nJroxyVU-3LRfQUYyz2ainfRFqIOdf1srFSU5RTsIgcI1LT1TtWPNf5TwXZ';
            $doctors= Doctor::where('id',$add->doctorId)->first();
            $patients= Patient::selection()->where('id',$add->patientId)->first();
            // dd($patients);
            $token_1 = $doctors->device_token;
            $name = $patients->first_name;
            $message='' ;
            if(isset($request->lang)  && $request -> lang == 'en' ){
                $message= 'booked an appointment';
            }else{
                $message='قام بحجز موعد';
            }
            
            $data = [
                "registration_ids" => [
                    $token_1
                ],
                "notification" => [
                    "title" => 'Espitalia',
                    "body" => $name + $message,
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
            return $this->returnData('favorite', $add);
            
            if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this -> returnSuccessMessage('Payment was successful');
            }else{
                return $this -> returnSuccessMessage('تم حجز الدفع والحجز بنجاح');
            } 
    }

    
    

    public function getAppointmentById(Request $request)
    {
        $appointments=Appointment::where('patientId',$request->id)
                                   ->where('payment_status','!=',0)
                                    ->orderBy('id', 'DESC')->get();
        foreach ($appointments as $item) {
            $item->doctor= Doctor::selection()->where('id',$item->doctorId)->first(); 
            $item->specialityName= Speciality::selection()->first();  
        }
        return $this->returnData('appointments', $appointments);
    }


    public function getReviewsOfDoctorId(Request $request)
    {
        $reviews=Reviews::where('doctorId',$request->doctorId)->orderBy('id', 'DESC')->get();
        
        return $this->returnData('reviews', $reviews);
    }

    public function getfavoriteById(Request $request)
    {
        //dd($request->patientid);
        $favorite=Favorite::where('patientId',$request->patientid)->orderBy('id', 'DESC')->get();
        foreach ($favorite as $item) {
            
            $item->doctor= Doctor::selection()->where('id',$item->doctorId)
                            ->with(array('specialityName'=>function($query){
                                $query->selection();
                            }))
                            ->with(array('services'=>function($query){
                                $query->selection();
                            }))->first(); 
        }
       return $this->returnData('favorite', $favorite);
    }
    
   


    public function removeFavorite(Request $request){
        $cats = Favorite::find($request->id);
        $cats->delete(); 
        if(isset($request->lang)  && $request -> lang == 'en' ){
            return $this -> returnSuccessMessage('Deleted Successfully');
        }else{
            return $this -> returnSuccessMessage('تم الحذف بنجاح');
        }
    }


    public function patientUpdate(Request $request)
    {
          $edit = Patient::findOrFail($request->id);
         // dd($edit);
        //$edit = Patient::where('id',1);
        // dd($edit->photo);
        //return $this->returnData('appointments', $edit);
         if($file=$request->file('photo'))
         {
            $file_extension = $request -> file('photo') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'assets_admin/img/patients';
            $request-> file('photo') ->move($path,$file_name);
            $edit->photo  = $file_nameone;
         }else{
            $edit->photo  = $edit->photo; 
         }

         if($request->first_name_ar){
             $edit->first_name_ar  = $request->first_name_ar; 
         }else{
            $edit->first_name_ar  = $edit->first_name_ar; 
         }


         if($request->last_name_ar){
            $edit->last_name_ar  = $request->last_name_ar; 
         }else{
            $edit->last_name_ar  = $edit->last_name_ar; 
         }
         if($request->first_name_en ){
            $edit->first_name_en  = $request->first_name_en; 
         }else{
            $edit->first_name_en  = $edit->first_name_en; 
         }
         if($request->last_name_en){
            $edit->last_name_en  = $request->last_name_en;  
         }else{
            $edit->last_name_en  = $edit->last_name_en;  
         }

        //  if($request->password){
        //     $edit->password  = bcrypt($request->password);  
        //  }else{
        //     $edit->password  = bcrypt($edit->password);    
        //  }
         if($request->mobile){
             $edit->mobile  = $request->mobile; 
         }else{
             $edit->mobile  = $edit->mobile; 
         }

         if($request->gender){
             $edit->gender  = $request->gender; 
         }else{
            $edit->gender  = $request->gender; 
         }

         if($request->dateOfBirth){
             $edit->dateOfBirth  = $request->dateOfBirth; 
         }else{
            $edit->dateOfBirth  = $edit->dateOfBirth; 
         }

        $edit-> save();
        // dd($edit->id);
        $patient = Patient::selection()->find($edit->id);

        return $this -> returnData('patient' , $patient);

        // return $this -> returnSuccessMessage('تم التعديل بنجاح');
        
    }


    public function doctorSpecialities()
    {
        $speciality=Speciality::selection()->get();
        return $this -> returnData(
            'speciality',$speciality
        );
    }
    public function contactInfo()
    {    
        
        $contactinfo = ContactInfo::selection()->first();
        
        
        return $this -> returnData(
            'home',$contactinfo
        );
    }
    
    
    public function getPaymentById(Request $request)
    {
        $payment=Payment::where('patientId',$request->patientId)->orderBy('id', 'DESC')->get();
        foreach ($payment as $item) {
            $item->doctor= Doctor::selection()->where('id',$item->doctorId)->first(); 
            $item->patient= Patient::selection()->where('id',$item->patientId)->first(); 
            $item->apointment= Appointment::where('id',$item->appointmentId)->first();   
        }
        return $this->returnData('payment', $payment);
    }
    public function Countries(Request $request)
    {
            $countries = Country::selection()->get(); 
            
            return $this->returnData('countries', $countries);
    }
    public function Cities(Request $request)
    {
            $cities = City::selection()->where('countryId',$request->countryId)->get(); 
            
            return $this->returnData('cities', $cities);
    }
    
    public function searchOnDoctor(Request $request)
    {
        $doctors = Doctor::selection()
                        ->where('gender',$request->gender)
                        ->where('specialityId',$request->specialityId)
                        ->where('countryId',$request->countryId)
                        ->where('cityId',$request->cityId)->get(); 
        foreach ($doctors as $item) {
            $item->specialityName= Speciality::selection()->where('id',$item->specialityId)->first();   
            $item->serviceName= Service::selection()->where('doctorId',$item->id)->where('status',1)->get(); 
            $item->countries= Country::selection()->where('id',$item->countryId)->first();
            $item->cities= City::selection()->where('id',$item->cityId)->first();
            $favorite = Favorite::where('doctorId',$item->id)->where('patientId',$request->patientId)->first();
            if($favorite ==null)
            {
                $item->favorite=0;
            }else{
                $item->favorite= 1;    
            }
            $working_days = WorkingDays::where('doctorId',$item->id)->first();
            if($working_days ==null)
            {
                $item->duration="";
            }else{
                $item->duration= $working_days->id;    
            }
        }
        return $this->returnData('doctors', $doctors);
    }
    public function appointmentStatus(Request $request)
    {
        // dd('gggg');
        $status_ppointment = Appointment::find($request->id);
        $status_ppointment->delete(); 
        if(isset($request->lang)  && $request -> lang == 'en' ){
            return $this -> returnSuccessMessage('Deleted Successfully');
        }else{
            return $this -> returnSuccessMessage('تم الحذف بنجاح');
        }
    }
    public function getDiagnosis(Request $request)
    {
        $diagnostics=Diagnostic::where('patientId',$request->patientId)->get();
        foreach ($diagnostics as $item) {
            $item->doctor= Doctor::selection()->where('id',$item->doctorId)->first();
        }
        return $this -> returnData('diagnostics',$diagnostics);
    }

}
