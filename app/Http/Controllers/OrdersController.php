<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index()
    {   
        ///// dd('uyvuyghvyhc');
        $orders=Order::get();
        foreach($orders as $item){
            $item->category=Category::where('id',$item->categoryId)->first();

            $patient=Patient::where('id',$item->patientId)->first();
            $patient->photo= "https://findfamily.net/care/assets_admin/img/patient/".$patient->photo;
            $item->patient=$patient;
            $doctor = Doctor::where('id',$item->doctorId)->first();
            if($doctor){
                $doctor->photo= "https://findfamily.net/care/assets_admin/img/doctors/photo/".$doctor->photo;
            }
            $item->doctor=$doctor;
            
        ///// subcategory
            $subcategory=[];
            $doctor_service_price_total=20;
            $order_sub_category= Order_sub_category::where('orderId',$item->id)->get();
            foreach ($order_sub_category as $order_sub_category_item) { 
                if($item->doctorId !=null){
                    $doctor_service_price = Doctor_service::where('doctorId',$item->doctorId)->where('subCategoryId',$order_sub_category_item->subCategoryId)->first();
                    $doctor_service_price_total +=Doctor_service::where('subCategoryId',$order_sub_category_item->subCategoryId)->sum('price');
                }else{
                    $doctor_service_price = SubCategory::where('id',$order_sub_category_item->subCategoryId)->first();
                    $doctor_service_price_total += SubCategory::where('id',$order_sub_category_item->subCategoryId)
                                                                ->sum('price');
                }  
                $subcategory[]=SubCategory::where("id" , $order_sub_category_item->subCategoryId)->first();
                foreach ($subcategory as $subcategory_item) {  
                    $subcategory_item->duration=$order_sub_category_item->duration;
                    if($doctor_service_price){
                        $subcategory_item->price=$doctor_service_price->price;
                    }
                }    
            }
            
            $item->subcategory=$subcategory;
            $item->total_price=$doctor_service_price_total;
        ////// product
            $products=[];
            $order_product= Order_product::where('orderId',$item->id)->get();                     
            foreach ($order_product as $order_product_item) {  
                $products[]=Product::where("id" , $order_product_item->orderProductId)->first();
            }
            foreach ($products as $product_item) {
                $product_item->image="https://findfamily.net/care/assets_admin/img/products/".$product_item->image;
            }
            $item->products=$products;
            
        // ///// order Patient location    
        //     $patient_location=Patient_location::where('id',$item->patientlocationId)->get();
        //     foreach ($patient_location as $patient_location_item) {
        //         $country= Country::selection()->where('id',$patient_location_item->countryId)->first();
        //         if($country){
        //             $patient_location_item->country=$country->name;
        //         }else{
        //             $patient_location_item->country=null;
        //         }
                
        //         $city= City::selection()->where('id',$patient_location_item->cityId)->first();
        //         if($city){
        //             $patient_location_item->city=$city->name;
        //         }else{
        //             $patient_location_item->city=null;
        //         }
        //     }    
        //     $item->patient_location=$patient_location;
            
        /// order people_under_care    
            // $item->people_under_care=People_under_care::where('id',$item->patientUnderCareId)->first();
            
            
        ////////// order image    
            // $item->order_image=Order_image::where('orderId',$item->id)->get();
              
            
        }
        // dd($orders);
        // return $this -> returnData(
        //     'data',$orders
        // );
        return view('admin.orders.all',compact('orders'));
    }
    public function orderDetails($orderId)
    {   

        // dd($orderId);
        $order=Order::findOrFail($orderId);
       
        $category=Category::where('id',$order->categoryId)->first();
        

        $patient=Patient::where('id',$order->patientId)->first();
        $patient->photo= "https://findfamily.net/care/assets_admin/img/patient/".$patient->photo;
            
        $doctor = Doctor::where('id',$order->doctorId)->first();
        if($doctor){
            $doctor->photo= "https://findfamily.net/care/assets_admin/img/doctors/photo/".$doctor->photo;
        }
            
        ///// subcategory
        $subcategory=[];
        $all_services_for_the_order=[];

        $doctor_service_price_total=0;

        $order_sub_category= Order_sub_category::where('orderId',$order->id)->get();


        foreach ($order_sub_category as $order_sub_category_item) { 
            $allservicess=Doctor_service::where('subCategoryId',$order_sub_category_item->subCategoryId)->first();
            if($allservicess !=null){
                $all_services_for_the_order[]=$allservicess;
            }
            if($order->doctorId !=null){
                $doctor_service_price = Doctor_service::where('doctorId',$order->doctorId)->where('subCategoryId',$order_sub_category_item->subCategoryId)->first();
                $doctor_service_price_total += Doctor_service::where('subCategoryId',$order_sub_category_item->subCategoryId)->sum('price');
            }else{
                $SubCategory_price = SubCategory::where('id',$order_sub_category_item->subCategoryId)->first();
                $doctor_service_price_total += SubCategory::where('id',$order_sub_category_item->subCategoryId)->sum('price');
            }  
            $subcategory[]=SubCategory::where("id",$order_sub_category_item->subCategoryId)->first();
            foreach ($subcategory as $subcategory_item) {  
                $subcategory_item->duration=$order_sub_category_item->duration;
                if($doctor_service_price){
                    $subcategory_item->price=$doctor_service_price->price;
                }
            }    
        }

        $alldoctors_for_this_services=[];
        // dd($all_services_for_the_order);
        foreach ($all_services_for_the_order as $all_services_for_the_order_item) { 
            $alldoctors_for_this_services[] = Doctor::where('id',$all_services_for_the_order_item->doctorId)->first();
        }

        // dd($subcategory);
        // dd($_category);
        ////// product
        $products=[];
        $order_product= Order_product::where('orderId',$order->id)->get();                     
        foreach ($order_product as $order_product_item) {  
            $products[]=Product::where("id" , $order_product_item->orderProductId)->first();
        }
        foreach ($products as $product_item) {
            $product_item->image="https://findfamily.net/care/assets_admin/img/products/".$product_item->image;
        }
        

        ///// order Patient location  
            $patient_location=Patient_location::where('id',$order->patientlocationId)->get();
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

        return view('admin.orders.order_details',compact('order','category','patient','subcategory','doctor_service_price_total','order_sub_category','products','alldoctors_for_this_services','patient_location'));
    
        /// order people_under_care    
            // $item->people_under_care=People_under_care::where('id',$item->patientUnderCareId)->first();
            
            
        ////////// order image    
            // $item->order_image=Order_image::where('orderId',$item->id)->get();
              
            
        
        // dd($orders);
        // return $this -> returnData(
        //     'data',$orders
        // );
        
    }
    
    // public function orderStatus(Request $request)
    // {
    //     $orderstatus = Order::where('id',$request->orderId)->first();
    //     if($orderstatus){
    //         $orderstatus->status  = $request->status;
    //         $orderstatus->save();
    //     }
    //     if(isset($request->lang)  && $request -> lang == 'en' ){
    //             return $this->returnSuccessMessage('updated Successfully ');
    //     }else{
    //         return $this->returnSuccessMessage('تم حفظ التعديل');
    //     }   
    // }    
}
