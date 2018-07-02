<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Message;
use JWTAuth;
use Response;
use JWTFactory;
use App\User;
use DB ;

class MessagesController extends Controller
{
    public function store(Request $request){
        $user = auth()->user();
       $id = $user->id;
        $message = new Message;
        $message->to = $request->to;
        $message->from = $id;
        $message->text = $request->text;

        $message->save();

        return response()->json($message);
       

    }

    public function conversation($id){
        $user = auth()->user();
        $otherUser = $user->id;
        $messages = Message::where('to' , $id)
        ->orWhere('to' , $otherUser)
        ->orderBy('created_at' , 'ASC')
        ->get();
        return response()->json($messages);

    }

    public function contacts(){
        $user = auth()->user();
        $id = $user->id;
        $contacts = Message::where('to' , $id)->orWhere('from' , $id)->distinct()->get(['from' , 'to']);
        $person = [];
        for($i = 0 ; $i < sizeof($contacts) ; $i++){
            if($id == $contacts[$i]->from){
               array_push($person , User::find($contacts[$i]->to));
            }else{
                array_push($person , User::find($contacts[$i]->from));
            }
        }
        $filtered = [];
       $filtered = array_unique($person);
        return response()->json(
            $filtered
            );
    } 
    public function startConversation($id){
        $user = User::where('id' , $id)->firstOrFail();
        return response()->json($user);
    }

    public function seen(){
        $user = auth()->user();
        $id = $user->id;
        $unseen = Message::where('to' , $id)->where('seen' , 0)->get();
        foreach($unseen as $seen){
            $seen->seen = 1;
            $seen->update();
        }

    }

}
