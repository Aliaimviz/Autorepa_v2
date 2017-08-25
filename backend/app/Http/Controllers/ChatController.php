<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class ChatController extends Controller
{
    public function chatMsg(Request $request){
    	
    	if($request->has('message') && $request->has('sender_id') && $request->has('receiver_id') ){
    		$message = new Message();
    		$message->message = $request->input('message');
    		$message->sender_id = $request->input('sender_id'); //Auth::user()->id
    		$message->receiver_id = $request->input('receiver_id'); //from Post

    		if($message->save()){
    		  return response()->json(['success' => 'Chat Message delivered'], 200);
    		}else{
    		  return response()->json(['error' => 'Chat Message couldnot be delivered'], 401);
    		}

    	}else{
    		return response()->json(['error' => 'Chat Message couldnot be delivered'], 401);
    	}
    }
}
