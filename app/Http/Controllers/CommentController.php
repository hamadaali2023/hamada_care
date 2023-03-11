<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use App\Patient;
use App\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $reviews=Comment::all();
        foreach ($reviews as $item) {
            $item->articlear= Article::where('id',$item->articleId)->first('title_ar')->title_ar;
            $item->articleen= Article::where('id',$item->articleId)->first('title_en')->title_en;
            $item->patientname= Patient::where('id',$item->patientId)->first('name')->name;

            $item->articleid= Article::where('id',$item->articleId)->first('id')->id;
            $item->doctor= Doctor::all();

        }
        //dd($reviews);
        return view('admin.reviews.all',compact('reviews'));
       
      
    }

    public function create()
    {
        return view('admin.reviews.create');
    }
    

    public function store(AircraftRequest $request)
    {
        $userId = 1;
        $file_extension = $request -> file('logoone') -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $file_nameone = $file_name;
        $path = 'admin/images/aircraft';
        $request-> file('logoone') ->move($path,$file_name);

        $request->merge(['created_by'=>$userId]);
        $request->merge(['logo'=>$file_nameone]);
        //dd($request->all());
        Comment::create($request->all());
        return redirect()->back()->with("message", __('admin.createSuccess')); 
    }

    
    public function edit(Comment $comment)
    {
        return view('admin.reviews.edit',compact('comment'));
    }

    public function update(AircraftRequest $request, Comment $comment)
    {
        $userId = 1;
         if($file=$request->file('logoone'))
         {
            $file_extension = $request -> file('logoone') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'admin/images/aircraft';
            $request-> file('logoone') ->move($path,$file_name);
            $request->merge(['logo'=>$file_nameone]);

             $request->merge(['updated_by'=>$userId]);
             $comment->update($request->all());
         }else{
          $request->merge(['logo'=> $request->url]);
          $request->merge(['updated_by'=>$userId]);
          $comment->update($request->all());
         }
       
        dd($request->all());
        //return redirect()->route('aircraft.index')->with("message", __('admin.updateSuccess')); 
    }

    public function destroy(Comment $comment)
    {

        $Charter=Charter::where('aircraftId',$comment->id)->get(); 
        if(count($Charter) == 0){
            $comment->delete();
            return redirect()->route('aircraft.index')->with("message", __('admin.deleteSuccess')); 
        }else{
           return redirect()->back()->with("error", 'It is not allowed to delete this item'); 
        }

        
    } 
}
