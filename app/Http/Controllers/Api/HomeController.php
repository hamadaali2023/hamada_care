<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ContactInfo;





use App\Doctor;
use App\Patient;

use Illuminate\Support\Facades\DB;
use Auth;
use App\City;
use App\Country;

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




class HomeController extends Controller   
{  
    use GeneralTrait; 
    public function getOrders(Request $request)
    {   
        
        if($request->patientId !=null){
            $orders=Order::where('patientId',$request->patientId)->get();
        }else{
            $orders=Order::where('doctorId',$request->doctorId)->get();
        }
        foreach($orders as $item){
            // $item->subcategory= SubCategory::where('id',$item->subCategoryId)->get();
            $item->category=Category::selection()->where('id',$item->categoryId)->first();
            $patient=Patient::where('id',$item->patientId)->first();
            $patient->photo= "https://findfamily.net/care/assets_admin/img/patient/".$patient->photo;
            $item->patient=$patient;
            $doctor = Doctor::where('id',$item->doctorId)->first();
            if($doctor){
                $doctor->photo= "https://findfamily.net/care/assets_admin/img/doctors/photo/".$doctor->photo;
            }
            $item->doctor=$doctor;
            
        // subcategory
            $subcategory=[];
            $doctor_service_price_total=20;
            $order_sub_category= Order_sub_category::where('orderId',$item->id)->get();
            foreach ($order_sub_category as $order_sub_category_item) { 
                if($item->doctorId !=null){
                $doctor_service_price = Doctor_service::where('doctorId',$item->doctorId)->where('subCategoryId',$order_sub_category_item->subCategoryId)->first();
                $doctor_service_price_total += Doctor_service::where('doctorId',$request->doctorId)
                                                                ->where('subCategoryId',$order_sub_category_item->subCategoryId)
                                                                ->sum('price');
                }else{
                    $doctor_service_price = SubCategory::where('id',$order_sub_category_item->subCategoryId)->first();
                    $doctor_service_price_total += SubCategory::where('id',$order_sub_category_item->subCategoryId)
                                                                ->sum('price');
                }  
                $subcategory[]=SubCategory::selection()->where("id" , $order_sub_category_item->subCategoryId)->first();
                foreach ($subcategory as $subcategory_item) {  
                    $subcategory_item->duration=$order_sub_category_item->duration;
                    if($doctor_service_price){
                        $subcategory_item->price=$doctor_service_price->price;
                    }else{
                        $subcategory_item->price=0;
                    }
                }    
            }
            
            $item->subcategory=$subcategory;
            $item->total_price=$doctor_service_price_total;
            
            $products=[];
            $order_product= Order_product::where('orderId',$item->id)->get();                     
            foreach ($order_product as $order_product_item) {  
                if($order_product_item->orderProductId !=null){
                    $products[]=Product::where("id" , $order_product_item->orderProductId)->first(); 
                }
                
            }
            foreach ($products as $product_item) {
                $product_item->image="https://findfamily.net/care/assets_admin/img/products/".$product_item->image;
            }
            $item->products=$products;
            
        /// order Patient location    
            $patient_location=Patient_location::where('id',$item->patientlocationId)->get();
            foreach ($patient_location as $patient_location_item) {
                $country= Country::selection()->where('id',$patient_location_item->countryId)->first();
                if($country){
                    $patient_location_item->country=$country->name;
                }else{
                    $patient_location_item->country=null;
                }
                
                $city= City::selection()->where('id',$patient_location_item->cityId)->first();
                if($city){
                    $patient_location_item->city=$city->name;
                }else{
                    $patient_location_item->city=null;
                }
            }    
            $item->patient_location=$patient_location;
            
        /// order people_under_care    
            $item->people_under_care=People_under_care::where('id',$item->patientUnderCareId)->first();
            
            
        /// order image    
            $item->order_image=Order_image::where('orderId',$item->id)->get();
              
            
        }
        return $this -> returnData(
            'data',$orders
        );
    }
    
    public function orderStatus(Request $request)
    {
        $orderstatus = Order::where('id',$request->orderId)->first();
        if($orderstatus){
            $orderstatus->status  = $request->status;
            $orderstatus->save();
        }
        if(isset($request->lang)  && $request -> lang == 'en' ){
                return $this->returnSuccessMessage('updated Successfully ');
        }else{
            return $this->returnSuccessMessage('تم حفظ التعديل');
        }   
    }
    
    public function Countries(Request $request)
    {
            $countries = Country::selection()->get(); 
            
            return $this->returnDataa('data', $countries,'iw7ryhfr');
    }

    public function Cities(Request $request)
    {
            $cities = City::selection()->where('countryId',$request->countryId)->get(); 
            
            return $this->returnDataa('cities', $cities,'wfiurw');
    }

    public function languages()
    {    
        $languages = Language::selection()->get();
        return $this -> returnDataa(
            'data',$languages,'igrfrwf'
        );
    }
    
    public function categotries()
    {    
        $categotries = Category::selection()->get();
        foreach ($categotries as $item) {
            $item->icon="https://findfamily.net/care/assets_admin/img/categories/".$item->icon;
            $item->subcategory= SubCategory::selection()->where('categoryId',$item->id)->get();  
            $products= Product::where('categoryId',$item->id)->get(); 
            foreach ($products as $product_item) {
                $product_item->image="https://findfamily.net/care/assets_admin/img/products/".$product_item->image;
                $product_item->hamada="ververver";
            }
            $item->products=$products;
        }    
        return $this -> returnDataa(
            'data',$categotries,'riuhfer'
        );
    }

    public function subcategory(Request $request)
    {
        $subcategory = SubCategory::selection()->where('categoryId',$request->categoryId)->get(); 
        foreach ($subcategory as $item) {
            $item->icon="https://findfamily.net/care/assets_admin/img/subcategory/".$item->icon;
        }
        return $this->returnData('data', $subcategory);
    }

    public function contactInfo()
    {    
        
        $contactinfo = ContactInfo::selection()->first();
        
        $contactinfo->logo="https://findfamily.net/care/assets_admin/img/settings/".$contactinfo->logo;
        $contactinfo->mesion_image="https://findfamily.net/care/assets_admin/img/settings/".$contactinfo->mesion_image;
        $contactinfo->vesion_image="https://findfamily.net/care/assets_admin/img/settings/".$contactinfo->vesion_image;
        $contactinfo->favicon="https://findfamily.net/care/assets_admin/img/settings/".$contactinfo->favicon;
        
        
        return $this -> returnDataa(
            'data',$contactinfo,'erifhr'
        );
    }
    
    

   
    
   
   

}
