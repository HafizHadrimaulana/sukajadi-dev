<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Events\ChatUpdate;
use App\Events\SendMessage;


use App\Models\Chat;
use App\Models\Message;

class ChatController extends Controller
{   

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
        ];

        $pesan = [
            'name.required' => 'Nama Wajib Diisi!',
            'email.required' => 'Email Wajib Diisi!',
            'email.email' => 'Format Email Salah!',
            'hp.required' => 'No HP Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

            DB::beginTransaction();
            try{
                $data = new Chat();
                $data->name = $request->name;
                $data->email = $request->email;
                $data->hp = $request->hp;
                $data->unseen_messages = 0;
                $data->last_sender = 'warga';
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'msg' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
                'data' => $data,
            ], 200);
        }
        // dd($request->all());

        
        // $chat = Chat::create([
        //     'name'              => $request->name,
        //     'email'             => $request->email,
        //     'unseen_messages'   => 0,
        //     'last_sender'       => 'customer'
        // ]);
        // return response()->json([
        //     'data' => $chat,
        //     'fail' => false,
        // ], 200);
    }

    public function message(Request $request)
    {
        
        $messages = Message::where('chat_id', $request->chat_id)->orderBy('created_at', 'asc')->get();
        foreach($messages as $message){
            $message->is_seen = 1;
            $message->save();
        }
        $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
        event(new ChatUpdate($chats));
        
        return response()->json($messages, 200);
    }

    public function send(Request $request)
    {
        
        $message = Message::create([
            'chat_id' => $request->chat_id,
            'type'    => 'text',
            'pesan' => $request->message,
            'is_seen' => 0,
            'sender'  => $request->sender
        ]);
        // dd($message);
        event(new SendMessage($message));

        if($message->sender == 'warga'){
            $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
            event(new ChatUpdate($message));
        }
        
        return response($message, 200);
    }

}