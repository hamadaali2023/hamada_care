<?php

namespace App\Http\Controllers\APIS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\chat;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;
use App\product;
use App\product_size;
use Session;
use Response;
use Carbon\Carbon;
use App\Traits\CkeckTockenTrait;


class ContactSuplier extends Controller
{
    use CkeckTockenTrait;

    // 
    public function sendContactS(request $request)
    {
        if($request->has('product_id')&& $request->has('quantity')&& $request->has('massage'))
        {
           $product= product::where('id',$request->product_id)->first();
           if($product)
           {
            if($request->headers->has('accesstoken') )
            {
                $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                if($validateToken)
                {
                    $UserId = $validateToken->account_id;   
                    if($UserId!=$product->Seller_id)
                    {
                        $isExpired = $this->validateAccessTokenTime($validateToken);
                        if($isExpired == 1)
                        {

                            $output['message'] = true;
                            $output['code'] = 6000;
                            $output['data'] ="Chat Start";  
                            $response = Response::make($output, 200);
                        }
                        elseif($isExpired == 2)
                        {

                            $Bayer=User::where('id',$product->Seller_id)->first();
                            $quantity=$request->quantity;
                            $emailaddress=$request->emailaddress;
                            $size=$request->size;
                            $from = $UserId;
                            $to = $Bayer->id;
                            $message = $request->massage;
                            $data = new chat();
                            $data->from = $from;
                            $data->to = $to;
                            $data->message = $message;
                            $data->emailaddress=$emailaddress;
                            $data->size=$emailaddress;
                            $data->quantity=$quantity;
                            $data->product_id=$product->id;
                            if(isset($request->pic))
                            {
                                $Iamge_name=time().".".$request->pic->getClientOriginalExtension();
                                $data->pic=$Iamge_name;
                                $data->save();
                        
                                $request->pic->move('upload/chat',$Iamge_name);
                            }

                            $data->is_read = 0; // message will be unread when sending message
                            $data->save();

                            // pusher
                            $options = array(
                                'cluster' => 'mt1',
                                'useTLS' => true
                            );

                            $pusher = new Pusher(
                                env('PUSHER_APP_KEY'),
                                env('PUSHER_APP_SECRET'),
                                env('PUSHER_APP_ID'),
                                $options
                            );

                            $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
                            $pusher->trigger('my-channel', 'my-event', $data);

                            $output['message'] = true;
                            $output['code'] = 6000;
                            $output['data'] ="Chat Start";  
                            $response = Response::make($output, 200);

                        }
                        else {

                            $output['message'] = false;
                            $output['code'] = 6001;
                            $output['data'] = "Invalid Token";  
                            $response = Response::make($output, 401);
                        }
                    }
                    else{
                        $output['message'] = false;
                        $output['code'] = 6001;
                        $output['data'] = "You Are The Owner Of This Product";
                        $response = Response::make($output, 400);

                    }

                    
                }
                else {
                    $output['message'] = false;
                    $output['code'] = 6001;
                    $output['data'] = "Login again";
                    $response = Response::make($output, 400);
                    
                }
            }
            else 
            {
                $output['message'] = false;
                $output['code'] = 6001;
                $output['data'] = "You must login";
                $response = Response::make($output, 400);
            }
           }
           else
           {
               $output['message'] = false;
                $output['code'] = 6001;
                $output['data'] = "Don't found this product";
                $response = Response::make($output, 400);
           }
        } 
        else 
        {

            $output['message'] = false;
            $output['code'] = 6001;
            $output['data'] = "Insert the product";
            $response = Response::make($output, 400);  
        }

        return response()->json($output);
    }


    // 

    public function index(request $request)
    {
       
          
            if($request->headers->has('accesstoken') )
            {
                $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                if($validateToken)
                {
                    $UserId = $validateToken->account_id;   
                   
                        $isExpired = $this->validateAccessTokenTime($validateToken);
                        if($isExpired == 1)
                        {
                           $id=$UserId;
                            $users = User::orWhereHas('receivedMessages', function ($q) use ($id) {
                                $q->where('from', $UserId);
                            })->orWhereHas('sentMessages', function ($q) use ($id) {
                                    $q->where('to', $UserId);
                            })->get();

                            $output['message'] = true;
                            $output['code'] = 6000;
                            $output['data'] =$users;   
                            $response = Response::make($output, 200);
                        }
                        elseif($isExpired == 2)
                        {
                            $users = User::orWhereHas('receivedMessages', function ($q) use ($UserId) {
                                $q->where('from', $UserId);
                            })->orWhereHas('sentMessages', function ($q) use ($UserId) {
                                    $q->where('to', $UserId);
                            })->get();

                            $output['message'] = true;
                            $output['code'] = 6000;
                            $output['data'] =$users;  
                            $response = Response::make($output, 200);

                        }
                        else {

                            $output['message'] = false;
                            $output['code'] = 6001;
                            $output['data'] = "Invalid Token";  
                            $response = Response::make($output, 401);
                        }
                    
                }
                else {
                    $output['message'] = false;
                    $output['code'] = 6001;
                    $output['data'] = "Login again";
                    $response = Response::make($output, 400);
                    
                }
            }
            else 
            {
                $output['message'] = false;
                $output['code'] = 6001;
                $output['data'] = "You must login";
                $response = Response::make($output, 400);
            }
        return response()->json($output);
    }

    // 

    public function getMessage(request $request)
    {
        if($request->has('user_id'))
        {
           $user= User::where('id',$request->user_id)->first();
           if($user)
           {
            if($request->headers->has('accesstoken') )
            {
                $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                if($validateToken)
                {
                    $UserId = $validateToken->account_id;   
                  
                        $isExpired = $this->validateAccessTokenTime($validateToken);
                        if($isExpired == 1)
                        {

                            $my_id = $UserId;
                            $user_id=$user->id;

                             // Make read all unread message
                            chat::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

                            // Get all message from selected user
                            $messages = chat::where(function ($query) use ($user_id, $my_id) {
                                $query->where('from', $user_id)->where('to', $my_id);
                            })->oRwhere(function ($query) use ($user_id, $my_id) {
                                $query->where('from', $my_id)->where('to', $user_id);
                            })->with('product')->with('product_image')->get();
                           

                         

                            $output['message'] = true;
                            $output['code'] = 6000;
                            $output['data'] =$messages; 
                            $response = Response::make($output, 200);
                        }
                        elseif($isExpired == 2)
                        {
                            $my_id = $UserId;
                            $user_id=$user->id;

                             // Make read all unread message
                            chat::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

                            // Get all message from selected user
                            $messages = chat::where(function ($query) use ($user_id, $my_id) {
                                $query->where('from', $user_id)->where('to', $my_id);
                            })->oRwhere(function ($query) use ($user_id, $my_id) {
                                $query->where('from', $my_id)->where('to', $user_id);
                            })->with('product')->with('product_image')->get();
                           

                         

                            $output['message'] = true;
                            $output['code'] = 6000;
                            $output['data'] =$messages;  
                            $response = Response::make($output, 200);

                        }
                        else {

                            $output['message'] = false;
                            $output['code'] = 6001;
                            $output['data'] = "Invalid Token";  
                            $response = Response::make($output, 401);
                        }
                    
                }
                else {
                    $output['message'] = false;
                    $output['code'] = 6001;
                    $output['data'] = "Login again";
                    $response = Response::make($output, 400);
                    
                }
            }
            else 
            {
                $output['message'] = false;
                $output['code'] = 6001;
                $output['data'] = "You must login";
                $response = Response::make($output, 400);
            }
           }
           else
           {
               $output['message'] = false;
                $output['code'] = 6001;
                $output['data'] = "Don't found this user";
                $response = Response::make($output, 400);
           }
        } 
        else 
        {

            $output['message'] = false;
            $output['code'] = 6001;
            $output['data'] = "Insert the user id";
            $response = Response::make($output, 400);  
        }

        return response()->json($output);
    }


    // 

    public function sendMessage(request $request)
    {
        if($request->has('receiver_id')&&  $request->has('message')&&  $request->message !="")
        {
           $user= User::where('id',$request->receiver_id)->first();
           if($user)
           {
            if($request->headers->has('accesstoken') )
            {
                $validateToken = $this->validateAccessToken($request->header("accesstoken"));
                if($validateToken)
                {
                    $UserId = $validateToken->account_id;   
                   
                        $isExpired = $this->validateAccessTokenTime($validateToken);
                        if($isExpired == 1)
                        { 
                            $response = Response::make($output, 200);  $from = $UserId;
                            $to = $request->receiver_id;
                            $message = $request->message;
                    
                            $data = new chat();
                            $data->from = $from;
                            $data->to = $to;
                            $data->message = $message;
                            $data->is_read = 0; // message will be unread when sending message
                            $data->save();
                    

                            // pusher
                            $options = array(
                                'cluster' => 'mt1',
                                'useTLS' => true
                            );

                            $pusher = new Pusher(
                                env('PUSHER_APP_KEY'),
                                env('PUSHER_APP_SECRET'),
                                env('PUSHER_APP_ID'),
                                $options
                            );

                            $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
                            $pusher->trigger('my-channel', 'my-event', $data);

                            $output['message'] = true;
                            $output['code'] = 6000;
                            $output['data'] ="Message send successfuly";  
                            $response = Response::make($output, 200);
                        }
                        elseif($isExpired == 2)
                        {

                            $from = $UserId;
                            $to = $request->receiver_id;
                            $message = $request->message;
                    
                            $data = new chat();
                            $data->from = $from;
                            $data->to = $to;
                            $data->message = $message;
                            $data->is_read = 0; // message will be unread when sending message
                            $data->save();
                    

                            // pusher
                            $options = array(
                                'cluster' => 'mt1',
                                'useTLS' => true
                            );

                            $pusher = new Pusher(
                                env('PUSHER_APP_KEY'),
                                env('PUSHER_APP_SECRET'),
                                env('PUSHER_APP_ID'),
                                $options
                            );

                            $data = ['from' => $from, 'to' => $to ,'message'=>$message]; // sending from and to user id when pressed enter
                            $pusher->trigger('my-channel', 'my-event', $data);

                            $output['message'] = true;
                            $output['code'] = 6000;
                            $output['data'] ="Message send successfuly";  
                            $response = Response::make($output, 200);

                        }
                        else {

                            $output['message'] = false;
                            $output['code'] = 6001;
                            $output['data'] = "Invalid Token";  
                            $response = Response::make($output, 401);
                        }
                }
                else {
                    $output['message'] = false;
                    $output['code'] = 6001;
                    $output['data'] = "Login again";
                    $response = Response::make($output, 400);
                    
                }
            }
            else 
            {
                $output['message'] = false;
                $output['code'] = 6001;
                $output['data'] = "You must login";
                $response = Response::make($output, 400);
            }
           }
           else
           {
               $output['message'] = false;
                $output['code'] = 6001;
                $output['data'] = "Don't found this user";
                $response = Response::make($output, 400);
           }
        } 
        else 
        {

            $output['message'] = false;
            $output['code'] = 6001;
            $output['data'] = "Insert the reciver_id & Message ";
            $response = Response::make($output, 400);  
        }

        return response()->json($output);
    }




    //Apis 
   
}
