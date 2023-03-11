<?php

namespace App\Http\Controllers;

use App\Article;
use App\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use App\Http\Requests\AircraftRequest;

use DB;
class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index()
    // {
    //     $articles=Article::all();
    //     return view('admin.articles.all',compact('articles'));
    // }

    // public function create()
    // {
    //     return view('admin.articles.create');
    // }
    

    public function store(Request $request)
    {
        $this->validate( $request,[          
                'specialityId'=>'required',
                'title_ar'=>'required',
                'title_en'=>'required',
                'description_ar'=>'required',
                'description_en'=>'required',                
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            ],
            [
                'specialityId.required'=>'يرجي اختيار تخصص',
                'title_ar.required'=>'اكتب عنوان المقال عربي',
                'title_en.required'=>'اكتب عنوان المقال النجليزي',
                'description_ar.required'=>'وصف المقال عربي',
                'description_en.required'=>'وصف المقال انجليزي',
                'image.required'=>' يرجي إختيار صورة jpeg,jpg,png,gif ',
            ]
        );

        $file_extension = $request -> file('image') -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $file_nameone = $file_name;
        $path = 'assets_admin/img/article';
        $request-> file('image') ->move($path,$file_name);

        $ghgth = new Article;
        $ghgth->specialityId    = $request->specialityId;
        $ghgth->doctorId    = $request->doctorId;
        $ghgth->title_ar    = $request->title_ar;
        $ghgth->title_en  = $request->title_ar;
        $ghgth->description_ar  = $request->description_ar;
        $ghgth->description_en  = $request->description_ar;
        $ghgth->image    = $file_nameone;
        $ghgth->save();
        
       
        return redirect()->back()->with("message",'تمت الإضافة بنجاح'); 
    }

    
    public function edit(Article $article)
    {
        return view('admin.articles.edit',compact('article'));
    }

    public function update(Request $request)
    {
         $this->validate( $request,[          
                // 'specialityId'=>'required',
                'title_ar'=>'required',
                'title_en'=>'required',
                'description_ar'=>'required',
                'description_en'=>'required',                
                // 'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            ],
            [
                // 'specialityId.required'=>'يرجي اختيار تخصص',
                'title_ar.required'=>'اكتب عنوان المقال عربي',
                'title_en.required'=>'اكتب عنوان المقال النجليزي',
                'description_ar.required'=>'وصف المقال عربي',
                'description_en.required'=>'وصف المقال انجليزي',
                // 'image.required'=>' يرجي إختيار صورة jpeg,jpg,png,gif ',
            ]
        );
         $edit = Article::findOrFail($request->id);
         if(isset($request->specialityId))
         {
            $edit->specialityId    = $request->specialityId;
         }else{
            $edit->specialityId    = $edit->specialityId ;
         }
         
         $edit->title_ar    = $request->title_ar;
         $edit->title_en  = $request->title_en;
         $edit->description_ar    = $request->description_ar;
         $edit->description_en  = $request->description_en;

         if($file=$request->file('image'))
         {
            $file_extension = $request -> file('image') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'assets_admin/img/article';
            $request-> file('image') ->move($path,$file_name);
            $edit->image  =$file_nameone;
         }else{
            $edit->image  = $edit->image; 
         }
         $edit->save();
        return back()->with("message", 'تم التعديل بنجاح'); 
    }

    public function destroy(Request $request)
    {

        $delete = Article::findOrFail($request->id);
        $delete->delete();
            return back()->with("message",'تم الحذف بنجاح');
        // return response()->json(['message' => 'User status updated successfully.']);

        
    } 
}
