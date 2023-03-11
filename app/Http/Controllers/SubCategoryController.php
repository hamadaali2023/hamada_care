<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Category;
class SubCategoryController extends Controller
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
        $subcategories=SubCategory::all();
        $categories=Category::all();
        return view('admin.subcategories.all',compact('subcategories','categories'));
    }

    // public function create()
    // {
    //     return view('admin.subcategories.create');
    // }
    
    public function store(Request $request)
    {
        // dd('fff');
        $file_extension = $request -> file('icon')->getClientOriginalExtension();
        $file_name = time().rand(1,100).'.'.$file_extension;
        $file_nameone = $file_name;
        $path = 'assets_admin/img/subcategory';
        $request-> file('icon') ->move($path,$file_name);

        $img_extension = $request -> file('image') -> getClientOriginalExtension();
        $img_name = time().rand(1,100).'.'.$img_extension;
        // $file_nameone = $file_name;
        $img_path = 'assets_admin/img/subcategory';
        $request-> file('image') ->move($img_path,$img_name);

        $add = new SubCategory;
        $add->categoryId    = $request->categoryId;
        $add->title_ar    = $request->title_ar;
        $add->title_en  = $request->title_en;
        $add->description_ar    = $request->description_ar;
        $add->description_en  = $request->description_en;
        $add->icon    = $file_nameone;
        $add->image    = $img_name;
        $add->price    = $request->price;
        $add->slug_ar    = $request->title_ar;
        $add->slug_en    = $request->title_en;
        // $add->type    = $request->type;
        if($request->top !=''){
            $add->top    = $request->top;
        }
        $add->save();
        return redirect()->back()->with("message", 'تم الإضافة بنجاح'); 
    }

    
    public function edit(SubCategory $subcategory)
    {
        $categories=Category::all();
        return view('admin.subcategories.edit',compact('subcategory','categories'));
    }

    public function update(Request $request)
    {
        $edit = SubCategory::findOrFail($request->id);
        $edit->title_ar  = $request->title_ar;
        $edit->title_en    = $request->title_en;
        $edit->description_ar    = $request->description_ar;
        $edit->description_en  = $request->description_en;
        $edit->price    = $request->price;
        $edit->slug_ar    = $request->title_ar;
        $edit->slug_en    = $request->title_en;
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
            $path = 'assets_admin/img/subcategory';
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
            $img_path = 'assets_admin/img/subcategory';
            $request-> file('image') ->move($img_path,$img_name);
            $edit->image  =$img_name;
        }else{
            $edit->image  = $edit->image; 
        }
        $edit->save();
        return redirect()->route('subcategories.index')->with("message", 'تم التعديل بنجاح'); 
    }


    public function destroy(Request $request )
    {
        
            $delete = SubCategory::findOrFail($request->id);
            $delete->delete();
            return redirect()->route('subcategories.index')->with("message",'تم الحذف بنجاح'); 
              
    } 
}
