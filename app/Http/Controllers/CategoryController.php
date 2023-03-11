<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use Gate;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:categories', ['only' => ['index']]);
        // $this->middleware('permission:اضافة صلاحية', ['only' => ['create','store']]);
        // $this->middleware('permission:تعديل صلاحية', ['only' => ['edit','update']]);
        // $this->middleware('permission:حذف صلاحية', ['only' => ['destroy']]);

    }

    public function index()
    {
        $categories=Category::all();
        return view('admin.categories.all',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }
    

    
    public function store(Request $request)
    {
        $file_extension = $request -> file('icon') -> getClientOriginalExtension();
        $file_name = time().rand(1,100).'.'.$file_extension;
        $file_nameone = $file_name;
        $path = 'assets_admin/img/categories';
        $request-> file('icon') ->move($path,$file_name);

        $img_extension = $request -> file('image') -> getClientOriginalExtension();
        $img_name = time().rand(1,100).'.'.$img_extension;
        // $file_nameone = $file_name;
        $img_path = 'assets_admin/img/categories';
        $request-> file('image') ->move($img_path,$img_name);

        $add = new Category;
        $add->name_en    = $request->name_en;
        $add->name_ar  = $request->name_ar;
        $add->description_ar    = $request->description_ar;
        $add->description_en  = $request->description_en;
        $add->icon    = $file_nameone;
        $add->image    = $img_name;
        $add->color    = $request->color;
        $add->slug    = $request->name_en;
        $add->type    = $request->type;
        
        if($request->top !=''){
            $add->top    = $request->top;
        }
        $add->save();


 
        return redirect()->back()->with("message", 'تم الإضافة بنجاح'); 
    }

    
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request)
    {
         

         $edit = Category::findOrFail($request->id);
         $edit->name_ar  = $request->name_ar;
         $edit->name_en    = $request->name_en;
         $edit->description_ar    = $request->description_ar;
         $edit->description_en  = $request->description_en;
         $edit->color    = $request->color;
         $edit->slug    = $request->name_en;
         if($request->top !=''){
            $edit->top    = $request->top;
         }else{
            $edit->top    = 0;
         }
         
         if($file=$request->file('icon'))
         {
            $file_extension = $request -> file('icon') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'assets_admin/img/categories';
            $request-> file('icon') ->move($path,$file_name);

            $edit->icon  =$file_nameone;
         }else{
            $edit->icon  = $edit->icon; 
         }

         if($file=$request->file('image'))
         {
            $img_extension = $request -> file('image') -> getClientOriginalExtension();
            $img_name = time().'.'.$img_extension;
            // $img_nameone = $img_name;
            $img_path = 'assets_admin/img/categories';
            $request-> file('image') ->move($img_path,$img_name);
            $edit->image  =$img_name;
         }else{
            $edit->image  = $edit->image; 
         }
         $edit->save();
        return redirect()->route('categories.index')->with("message", 'تم التعديل بنجاح'); 
    }


    public function destroy(Request $request )
    {
        $appointment=SubCategory::where('categoryId',$request->id)->get(); 
        if(count($appointment) == 0){
            $delete = Category::findOrFail($request->id);
            $delete->delete();
            return redirect()->route('categories.index')->with("message",'تم الحذف بنجاح'); 
        }else{
           return redirect()->back()->with("error", 'غير مسموح حذف هذا العنصر'); 
        }        
    } 
}
