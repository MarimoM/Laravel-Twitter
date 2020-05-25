<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\messages;
use App\User;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($message_id)
    {
        $message = messages::find($message_id);
        $sender = User::find(auth()->User()->id);
        $owner = User::find($message->user_id);
        return view('reply.create', ['owner' => $owner, 'sender' => $sender])->with('message', $message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $message_id)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $request->validate([
            'text' => 'required|max:150'
        ]);

        $reply = new Reply;
        $reply->text = $request->text;
        $reply->sender_id = auth()->User()->id;
        $reply->message_id = $message_id;
        $reply->save();

        $replies = messages::join('replies', 'replies.message_id', '=', 'messages.id')
            ->select('replies.*');
        
        $replies = User::join('replies', 'replies.sender_id', '=', 'users.id')
            ->select('replies.*', 'users.first_name') 
            ->orderBy('created_at', 'desc')   
            ->paginate(10);

        $message = messages::find($message_id);
        $user = User::find($message->user_id);

        return redirect()->route('messages.show', ['message' => $message])->with('success', 'Reply sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $reply_id)
    {
        $reply = Reply::find($reply_id);
        $reply->delete();
        $message = messages::find($id);

        return redirect()->route('messages.show', ['message' => $message])->with('success', 'Reply has been deleted');
    }
}
