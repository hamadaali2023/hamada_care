<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use DB;
use App\category;
use App\city;
use App\product;
use App\product_section;
use App\SubCategry;
use App\Section;

use Auth;
use App\Shop;
use App\Country;
use App\Units;
use App\Product_color;
use App\Product_image;
use App\Contactus;
use App\Product_offer;
use App\User;
use App\User_Role;
use App\Items;
use App\Product_more_Details;
use App\Product_Reviews;
use App\User_Product_Love;
use Image;
use App\Shop_follow;
use App\Traits\PushNotificationsTrait;
use App\CartApi;
use App\Size;
use App\CatSize;

use App\Notifications\Addproduct;
class AddController extends Controller
{
   use PushNotificationsTrait;

 public function __construct()
    { 
       $categories=category::orderBy('id', 'Asc')->get();
        View::share('categories',$categories);
         $contact=Contactus::first();
        View::share('contactus',$contact);
         $logo = DB::table('settings')->first();
        View::share('logo',$logo);
         $icon = DB::table('settings')->first();
        View::share('icon',$icon);
        //dd($contact);
    }
    public function index()
    {    
        if(! Auth::user())
       {
           return redirect ('/login/user');
           
       }
        $catogorys=category::all();
        $Countrys=Country::all();
        $Units=Units::all();  

        return view('front.addproduct.addproduct',compact('catogorys','Countrys','Units'));
    }

    public function productCat($id)
    {
        $SubCategory=SubCategry::where('catID',$id)->get();
        $arr=array();
        $arr[0]="<option value='0'>أختر القسم</option>";
        foreach($SubCategory as $i=>$SubCategor)
        {
            $arr[$i+1]="<option value='$SubCategor->id'>$SubCategor->SubCategries_name</option>";
        }
        return \Response::json($arr);
    }
     public function productsize($id)
    {
        $sizes=CatSize::where('cat_id',$id)->get();
        $arr=array();
        // $arr[0]="<option value='0'>أختر القسم</option>";
        foreach($sizes as $i=>$size)
        {
            $singelsize=Size::where('id',$size->size_id)->first();
            $arr[$i]="<option value='$singelsize->id'>$singelsize->size</option>";
        }
        return \Response::json($arr);
    }
     public function productCat2($id)
    {
        $Items=Items::join('category_item','category_item.item_id','items.id')
        ->where('category_item.category_id',$id)->select('items.*')->get();
        $NumberOfImage=category::where('id',$id)->select('numImage')->first();
        $arr=array();
        $arr[0]="<span class='num'>$NumberOfImage->numImage</span>";
        // $j=1;
        foreach($Items as $j=>$Item)
        {
               // 
            if($Item->name=="المقاس")
            {
                $arr[$j+1]=" 
                <div class='col-md-6'>
                 <div class='single-input newd'>
                 <select name='products_Detalis[$Item->id]'>
                 <option value='0'>$Item->name</option>
                 <option value='S'>S</option>

                 <option value='M'>M</option>
                 <option value='L'>L</option>
                 <option value='XL'>Xl</option>
                 <option value='2XL'>2Xl</option>
                 <option value='3XL'>3Xl</option>
                 <option value='4XL'>4Xl</option>
                 <option value='5XL'>5Xl</option>





                 </select>
                 </div>
                 </div>";

            }
            else{
                $arr[$j+1]=" 
                <div class='col-md-6'>
                 <div class='single-input newd'><input style='background-color:white;color: #0275d8; border-radius: 3px;border: 1px solid #0275d8;' placeholder='$Item->name' type='text' name='products_Detalis[$Item->id]' id='customer-companyname'></div></div>";

            }
            // 
        }
        return \Response::json($arr);
    }

    public function productSub($id)
    {
        $sections=Section::where('SubCatID',$id)->get();
        $arr=array();
        foreach($sections as $i=>$section)
        {
            $arr[$i]=" <option value='$section->id'>$section->title</option>";
        }
        return \Response::json($arr);
    }

    

    public function productDelete($id)
    {   
        product::where('id',$id)->delete();
        Product_color::where('product',$id)->delete();
       Product_offer::where('product_id',$id)->delete();
        CartApi::where('product_id',$id)->delete();



        $Product_image=Product_image::where('product_id',$id)->get();
        foreach($Product_image as $p)
        {
            if(file_exists('/home/maojxlha/public_html/upload/product/'.$p->image.'')){
                unlink('/home/maojxlha/public_html/upload/product/'.$p->image.'');
            }

        }
        Product_image::where('product_id',$id)->delete();
        User_Product_Love::where('product_id',$id)->delete();

        return back();  
  
    }
    
     public function imageproductdelete($id)
    {
        $Image=Product_image::where('id',$id)->first();
        if(file_exists('/home/maojxlha/public_html/upload/product/'.$Image->image.'')){
           unlink('/home/maojxlha/public_html/upload/product/'.$Image->image.'');
        }
       
         
        Product_image::where('id',$id)->delete();
        return back();
    }

    public function ColorProductDelete($id)
    {
        Product_color::where('id',$id)->delete();
        return back();
    }


    public function productedit($id)
    {
         $catogorys=category::all();
        $Countrys=Country::all();
        $Units=Units::all(); 
        $SubCategrys=SubCategry::all();
        $Sections=Section::all();
        $product_more_Details=Product_more_Details::where('product_id',$id)->get();


        $Product_images=Product_image::where('product_id',$id)->get();
        $Product_colors=Product_color::where('product',$id)->get();
        $product=product::find($id);

        // dd($product);
        return view("front.addproduct.editproduct",compact('product_more_Details','Product_colors','Product_images',"product",'SubCategrys','Sections',"catogorys",'Countrys','Units'));
    }

    public function productAddoffer($id)
    {
        $product=product::where('id',$id)->first();
        $Offer=Product_offer::where('product_id',$id)->first();
        return view("front.addproduct.OfferProducts",compact("product",'Offer'));
    }

    public function OfferStore(request $request)
    {
        $this->validate( $request,
                    [   
                        'offer_price'=>'required',
                        'due_date'=>'required',
                        
                    ],
                    [
                        'offer_price.required'=>'يجب إدخال سعر الجديد للمنتج',
                        'due_date.required'=>' يجب إدخال موعد أنتهاءالعرض',
                        
                    ]
            );

        $product=product::where('id',$request->product_id)->first();
         if($request->offer_price>=$product->products_price)
        {
            return redirect()->back()->with('Fail', "لا يجوز أن يكون سعر العرض أكبر من السعر الأساسي"); 
        }
        $offer=Product_offer::where('product_id',$product->id)->first();
        if(isset($offer))
        {
            $product->offer=1;
            $product->save();
            $offer->product_id=$request->product_id;
            $offer->new_price=$request->offer_price;
            $offer->set_date=$request->set_date;
            $offer->Due_date=$request->due_date;
            $offer->save();

        }
        else 
        {
            $offer=new Product_offer(); 
            $product->offer=1;
            $product->save();
            $offer->product_id=$request->product_id;
            $offer->new_price=$request->offer_price;
            $offer->set_date=$request->set_date;
            $offer->Due_date=$request->due_date;
            $offer->save();
            
        }
        return back();
    }

    // delete Offer
    public function offerDelete($id)
    {
        Product_offer::where('id',$id)->delete();
        return back();
    } 
    
      public function productsStore(request $request)
    {
       //dd($request);
         $category=category::where('id',$request->Product_catogary)->first();
        if(isset($request->Product_url) && $category!==null)
        {
            if(count($request->Product_url)>$category->numImage)
            {
             return redirect()->back()->with('Fail', "لا يمكنك تحميل أكتر من $category->numImage صور"); 
            }
        }
        
        $users=User::join('role_user','users.id','role_user.user_id')
        ->join('roles','role_user.role_id','roles.id')
        ->join('permission_role','roles.id','permission_role.role_id')
        ->join('permissions','permission_role.permission_id','permissions.id')
        ->where('permissions.id',13)
        ->select('users.*')->get();
             
        $this->validate( $request,
                [   
                    'products_title'=>'required',
                    'Product_Descraption'=>'required',
                    'products_price'=>'required|numeric',
                    'Product_catogary'=>'required',
                    'sub_Category'=>'required',
                   
                    'country'=>'required',
                    'BuyWay'=>'required',
                    'countity'=>'required',
                    'Product_url'=>'required',
                     'Product_url'=>'required|array|min:1|max:5',

                   'Product_url.*'=>'image|mimes:jpeg,png,jpg|max:1000',
       
                ],
                [
                    'products_title.required'=>'يجب إدخال عنوان المنتج',
                    'Product_Descraption.required'=>'يجب إدخال وصف للمنتج',
                    'products_price.required'=>' يجب إدخال سعر المنتج ',
                    'products_price.numeric'=>' يجب أن يكون سعر  منتج  رقم باللغة الأنجليزية',
                    'Product_catogary.required'=>' يرجي أختيار تصنيف المنتج ', 
                    'sub_Category.required'=>' يرجي أختيار قسم المنتج ',
                    
                    'country.required'=>' يرجي أختيار بلد المنشأ المنتج ',
                    'BuyWay.required'=>' يرجي أختيار طريقه بيع المنتج ',
                    'countity.required'=>' يرجي أدخال الكمية المنتج ',
                    'Product_url.required'=>' يرجي أدخال صورة للمنتج على الأقل صورة واحدة ',
                    'Product_url.max'=>' يجب ان لا يزيد عدد الصور عن 5 صور للمنتج الواحد',
                    'Product_url.*.image'=>' يجيب رفع ملف من نوع صوره',
                    'Product_url.*.mimes'=>'  يجب ان تكون الصوره من صيغه png,jpg',
                ]
        );
        

        if(isset($request->Product_url))
        {
            foreach($request->Product_url as $Image)
            {
                if($Image->getClientOriginalExtension()!='png'&&  $Image->getClientOriginalExtension()!='jpg' && $Image->getClientOriginalExtension()!='jpeg')
                {
                   
                    return redirect()->back()->with('Fail', "صغة الصورة غير مدعومة 
يجب أن تكون الصور بصغة  png . jpg . jpeg"); 

                }
               
            }
        }

   
       // $Iamge_name=time().".".$request->Product_url->getClientOriginalExtension();
       $products=new product();
       $products->products_title=$request->products_title;
       $products->products_descraption=$request->Product_Descraption;
       $products->products_price=$request->products_price;
       $products->Category_id=$request->Product_catogary;
       $products->sub_Category=$request->sub_Category;
       $products->section=$request->section;
       $products->country=$request->country;
       $products->BuyWay=$request->BuyWay;
       $products->countity=$request->countity;
       $products->Seller_id=$request->user_id ;
       $products->save();
       
       if(isset($request->color)&& ($request->products_size==NULL))
       {
           if(count($request->color)==count($request->NumColor))
                {
                    //save multi color of product
                    foreach($request->color as $i=>$color)
                    {
                        $Product_color=new Product_color();
                        $Product_color->color=$color;
                        $Product_color->countity=$request->NumColor[$i];
                        $Product_color->product=$products->id;
                        $Product_color->save();
                    }
                }
        }
        else if(isset($request->color)&& isset($request->products_size))
         {
           if(count($request->color)==count($request->NumColor)&&count($request->products_size)==count($request->color))
                {
                    //save multi color of product
                    foreach($request->color as $i=>$color)
                    {
                        $Product_color=new Product_color();
                        $Product_color->color=$color;
                        $Product_color->countity=$request->NumColor[$i];
                        $Product_color->product=$products->id;
                        $Product_color->size=$request->products_size[$i];

                        $Product_color->save();
                    }
                }
        }
        else if(isset($request->products_size)&&count($request->color)>0)
        {
            foreach($request->products_size as $i=>$size)
                    {
                        $Product_color=new Product_color();
                        $Product_color->color=0;
                        $Product_color->countity=$request->NumColor[$i];
                        $Product_color->product=$products->id;
                        $Product_color->size=size;

                        $Product_color->save();
                    }
            
        }
      
           
       
        
       
       // save multi image of product
       if(isset($request->Product_url))
       {
           $Images=$request->Product_url;
           foreach($Images as $i=>$Image)
           {
             
            // 
            $ImageName = time().$i.'.'.$Image->getClientOriginalExtension();
              $destinationPath = 'upload/product';
              $img = Image::make($Image->getRealPath());
              $watermark = Image::make('account/frontend-style/images/logo/l.png');
              //$watermark->resize(150,150);
            //   $img->insert($watermark, 'bottom-left');
            $img->insert($watermark, 'center');
              $img->save($destinationPath.'/'.$ImageName);
              
              $Product_image=new Product_image();
              $Product_image->image=$ImageName;
              $Product_image->product_id=$products->id;
              $Product_image->save(); 
            
            
            // 
              
              
                  
           }
       }
       
        if(isset($request->products_Detalis))
       {
           foreach($request->products_Detalis as $i=>$detail)
           {
              $Item=Items::where('id',$i)->first();
              $product_Items=new Product_more_Details();
              $product_Items->Details=$Item->name;
              $product_Items->value=$detail;
              $product_Items->product_id=$products->id;
              $product_Items->save();
           }

       }

        
        //  auth()->user()->notify(new Addproduct($products));
         foreach($users as $user)
         {
              $user->notify(new Addproduct($products));
         }
         
        // 
        //  shop notfy
        $shops=Shop::where('user_id',$products->Seller_id)->get();
        foreach($shops as $shop)
        {
            $users=Shop_follow::where('shop',$shop->id)->get();
            foreach($users as $user)
            {
                $User=User::where('id',$user->user)->first();
                if($User)
                {
                   //mob notification :)
                   $token = $User->Device_Token;
                            
                   $title = "تمت أضافة منتج جديد ";
                   $body =   " تمت أضافة منتج جديد الى محل {{$shop->shop_name}}";
                   // call function that will push notifications :
                   $this->sendNotification($token , $title , $body);
                }
            }
        }
        
        // 
        return back()->with("message", "$products->slug"); 
    }
    
    
      public function editproductsStore(request $request)
    {
         //dd($request);
        $category=category::where('id',$request->Product_catogary)->first();
        if(isset($request->Product_url) && $category!==null)
        {
            if(count($request->Product_url)>$category->numImage)
            {
             return redirect()->back()->with('Fail', "لا يمكنك تحميل أكتر من $category->numImage صور"); 
            }
        }
        // ----------------------
        $this->validate( $request,
                [   
                    'products_title'=>'required',
                    'Product_Descraption'=>'required',
                    'products_price'=>'required',
                    'Product_catogary'=>'required',
                    'sub_Category'=>'required',
                    'country'=>'required',
                    'BuyWay'=>'required',
                    'countity'=>'required',
                    'Product_url.*'=>'image|mimes:jpeg,png',
                    
                ],
                [
                    'products_title.required'=>'يجب إدخال عنوان المنتج',
                    'Product_Descraption.required'=>'يجب إدخال وصف للمنتج',
                    'products_price.required'=>' يجب إدخال سعر المنتج ',
                    'Product_catogary.required'=>' يرجي أختيار تصنيف المنتج ', 
                    'sub_Category.required'=>' يرجي أختيار قسم المنتج ',
                    'country.required'=>' يرجي أختيار بلد المنشأ المنتج ',
                    'BuyWay.required'=>' يرجي أختيار طريقه بيع المنتج ',
                    'countity.required'=>' يرجي أدخال الكمية المنتج ',
                   
                     'Product_url.required'=>' يرجي أدخال صورة للمنتج على الأقل صورة واحدة ',
                    'Product_url.max'=>' يجب ان لا يزيد عدد الصور عن 5 صور للمنتج الواحد',
                    'Product_url.*.image'=>' يجيب رفع ملف من نوع صوره',
                    'Product_url.*.mimes'=>'  يجب ان تكون الصوره من صيغه png,jpg',
                ]
        );

        if(isset($request->Product_url))
        {
            foreach($request->Product_url as $Image)
            {
                if($Image->getClientOriginalExtension()!='png'&& $Image->getClientOriginalExtension()!='jpg'&& $Image->getClientOriginalExtension()!='jpeg')
                {
                   
                    return redirect()->back()->with('Fail', "صغة الصورة غير مدعومة 
يجب أن تكون الصور بصغة  png . jpg . jpeg"); 

                }
               
            }
        }

    
       // $Iamge_name=time().".".$request->Product_url->getClientOriginalExtension();
       $products= product::where('id',$request->id)->first();
       $products->products_title=$request->products_title;
       $products->products_descraption=$request->Product_Descraption;
       $products->products_price=$request->products_price;
       $products->Category_id=$request->Product_catogary;
       $products->sub_Category=$request->sub_Category;
       $products->section=$request->section;
       $products->country=$request->country;
       $products->BuyWay=$request->BuyWay;
       $products->countity=$request->countity;
       $products->Seller_id=$request->user_id ;
       $products->save();

       Product_color::where('product',$request->id)->delete();

       if(isset($request->color))
       {
            if(count($request->color)==count($request->NumColor))
            {
               
                //save multi color of product
                foreach($request->color as $i=>$color)
                {
                    $Product_color=new Product_color();
                    $Product_color->color=$color;
                    $Product_color->countity=$request->NumColor[$i];
                    $Product_color->product=$products->id;
                    $Product_color->save();
                }
            }
            else
            {
                return redirect()->back();
            }

       }
        
       
       // save multi image of product
       if(isset($request->Product_url))
       {
           $Images=$request->Product_url;
           foreach($Images as $i=>$Image)
           {
            //   $Iamge_name=time().".".$i.$Image->getClientOriginalExtension();
            //   $Image->move('upload/product',$Iamge_name);
            //  $image = $request->file('image');
            $ImageName = time().$i.'.'.$Image->getClientOriginalExtension();
              $destinationPath = 'upload/product';
              $img = Image::make($Image->getRealPath());
              $watermark = Image::make('account/frontend-style/images/logo/l.png');
              //$watermark->resize(150,150);
            //   $img->insert($watermark, 'bottom-left');
            $img->insert($watermark, 'center');
              $img->save($destinationPath.'/'.$ImageName);
              
              $Product_image=new Product_image();
              $Product_image->image=$ImageName;
              $Product_image->product_id=$products->id;
              $Product_image->save();      
           }
       }

       //  
       if(isset($request->products_Detalis))
       {
           foreach($request->products_Detalis as $i=>$detail)
           {
              $Item=Items::where('id',$i)->first();
              $product_Items=new Product_more_Details();
              $product_Items->Details=$Item->name;
              if($detail!=null)
              {
                $product_Items->value=$detail;
                $product_Items->product_id=$products->id;
                $product_Items->save();

              }
            
           }

       }
       //
       if(isset($request->products_Detalisedit))
       {
           foreach($request->products_Detalisedit as $i=>$detail)
           {
            //   $Item=Items::where('id',$i)->first();
              $product_Items= Product_more_Details::where('id',$i)->first();
              
              $product_Items->value=$detail[0];
              $product_Items->save();
           }

       }
        //  
       return back()->with("message", "$products->slug"); 
    }
    
    public function reviews(request $request)
    {
        $Product_Reviews=new Product_Reviews();
        $Product_Reviews->product_id=$request->productid;
        $Product_Reviews->user_id=Auth::user()->id;
        $Product_Reviews->review=$request->review;
        $Product_Reviews->numOfstar=$request->number;
        $Product_Reviews->save();
        $productReviewAsss=Product_Reviews::where('product_id',$request->productid)->orderBy('id','DESC')->get();
        $Total=0;
        if($productReviewAsss!==null)
        {
            foreach($productReviewAsss as $PR)
            {
                $Total=$Total+$PR->numOfstar;
            }

        }
        $Rate=$Total/count($productReviewAsss);
        $product=product::where('id',$request->productid)->first();
        $product->Rates=$Rate;
        $product->save();
        return 'success';
    }
    
     public function product_more_detaildelete($id)
    {
        Product_more_Details::where('id',$id)->delete();
        return back();

    }
     
     
     
     
}
