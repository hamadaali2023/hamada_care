<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pannars=Banner::all();
        return view('admin.pannars.all',compact('pannars'));
    }

    public function create()
    {
        return view('admin.pannars.create');
    }
    

    public function store(Request $request)
    {
        
        
           $this->validate( $request,[          
                
                'pannar' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            ],
            [
                
                'pannar.required'=>' يرجي إختيار صورة jpeg,jpg,png,gif ',
            ]
        );

        $file_extension = $request -> file('pannar') -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $file_nameone = $file_name;
        $path = 'assets_admin/img/pannars';
        $request-> file('pannar') ->move($path,$file_name);

        $ghgth = new Banner;
        
        $ghgth->pannar    = $file_nameone;
        $ghgth->save();
        return redirect()->back()->with("message", 'تمت الإضافة بنجاح'); 
    }

    
    public function edit(Banner $banner)
    {
        return view('admin.pannars.edit',compact('banner'));
    }

    public function update(Request $request)
    {
        $edit = Banner::findOrFail($request->id);
         
        
         if($file=$request->file('pannar'))
         {
            $file_extension = $request -> file('pannar') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'assets_admin/img/pannars';
            $request-> file('pannar') ->move($path,$file_name);

            $edit->pannar  =$file_nameone;
         }else{
            $edit->pannar  = $edit->pannar; 
         }
         $edit->save();


        // $category = Speciality::findOrFail($request->id);

        // $category->update($request->all());
       
        return redirect()->route('pannars.index')->with("message", 'تم التعديل بنجاح'); 
    }

   public function destroy(Request $request )
    {
        $delete = Banner::findOrFail($request->id);
        $delete->delete();
            return redirect()->route('pannars.index')->with("message",'تم الحذف بنجاح');

       

        
    } 
}
