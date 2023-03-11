<?php
namespace App\Http\Controllers\Api;
// all
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Traits\GeneralTrait;

use App\Life;

class LifeController extends Controller
{
    use GeneralTrait;
         
    public function create(Request $request)
    {
        // dd('fffffffff');
        $add = new Life;
        // if($file=$request->file('hostImage'))
        // {
        //     $file_extension = $request -> file('hostImage') -> getClientOriginalExtension();
        //     $file_name = time().rand(1,100).'.'.$file_extension;
        //     $file_nameone = $file_name;
        //     $path = 'assets_admin/img/lives';
        //     $request-> file('hostImage') ->move($path,$file_name);
        //     $add->hostImage  = $file_nameone;
        // }
        
        $add->liveId    = $request->liveId;
        $add->channelId  = $request->channelId;
        $add->channelName  = $request->channelName;
        $add->liveDate  = $request->liveDate;
        $add->noOfViewers  = $request->noOfViewers;
        $add->hostImage  = $request->hostImage;
        $add->hostName  = $request->hostName;
        $add->save();     
        return $this->returnDataa('data', $add,'vrev'); 
    }
    public function update(Request $request)
    {
        $edit = Life::findOrFail($request->LiveId);
        // if($file=$request->file('hostImage'))
        // {
        //     $file_extension = $request -> file('hostImage') -> getClientOriginalExtension();
        //     $file_name = time().rand(1,100).'.'.$file_extension;
        //     $file_nameone = $file_name;
        //     $path = 'assets_admin/img/lives';
        //     $request-> file('hostImage') ->move($path,$file_name);
        //     $edit->hostImage  = $file_nameone;
        // }else{
        //     $edit->hostImage  = $edit->hostImage; 
        // }
        $edit->liveId  = $edit->liveId; 
        $edit->channelId  = $edit->channelId; 
        $edit->channelName  = $edit->channelName; 
        $edit->liveDate  = $edit->liveDate; 
        $edit->noOfViewers  = $edit->noOfViewers; 
        $edit->hostImage  = $request->hostImage;
        $edit->hostName  = $edit->hostName; 
        $edit-> save();
         return $this->returnSuccessMessage('updated Successfully ');
    }
    public function delete(Request $request)
    {
        $checklive = Life::where('id',$request->LiveId)->first();
        if($checklive){
            $checklive->delete();
        }            
         return $this->returnSuccessMessage('deleted Successfully ');
    }
    public function get(Request $request)
    {
        $lives = Life::get(); 
        // foreach ($lives as $item) {
        //   $item->hostImage="https://findfamily.net/care/assets_admin/img/lives/".$item->hostImage;
        // }
        return $this->returnDataa('data', $lives,'vrev');          
    }
}