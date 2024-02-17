<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
use App\Models\Kegiatan;
use Storage;
use App\Events\ChatUpdate;
use App\Events\SendMessage;

use App\Models\Chat;
use App\Models\Message;

class LiveChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $chats = Chat::withCount('unseen_messages')
        ->orderBy('unseen_messages_count', 'DESC')
        ->paginate(4);

        // return dd($chats);
        return view('page.admin.livechat.index',[
            'chats' => $chats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMessages(Request $request)
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $message = Message::create([
            'chat_id' => $request->chat_id,
            'type'    => 'text',
            'pesan' => $request->message,
            'is_seen' => 0,
            'sender'  => 'admin'
        ]);
        event(new SendMessage($message));

        if($message->sender == 'warga'){
            $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
            event(new ChatUpdate($chats));
        }
        
        return response($message, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        $chats = Chat::withCount('unseen_messages')
        ->orderBy('unseen_messages_count', 'DESC')
        ->paginate(4);

        return response()->json($chats, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
