<?php

namespace App\Http\Controllers;

use App\messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Reply;
use DB;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = messages::join('users', 'users.id', '=', 'messages.user_id')
            ->select('messages.*', 'users.first_name') 
            ->orderBy('created_at', 'desc')   
            ->paginate(10);

        return view('messages.index', ['messages' => $messages]);
    }

    public function create()
    {
        if (!Auth::check())
        {
            return redirect('/login');
        }

        return view('messages.create');
    }

    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $request->validate([
            'text' => 'required|max:150',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image'))
        {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extention;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $message = new messages;
        $message->text = $request->text;
        $message->user_id = auth()->User()->id;
        $message->cover_image = $fileNameToStore;
        $message->save();

        return redirect('/messages')->with('success', 'Message sent');
    }

    public function show($id)
    {
        $message = messages::find($id);
        $user = User::find($message->user_id);
        
        $replies = User::join('replies', 'replies.sender_id', '=', 'users.id')
            ->where('replies.message_id', '=', $id)
            ->select('replies.*', 'users.first_name') 
            ->orderBy('created_at', 'desc')   
            ->paginate(10);

        return view('messages.show', ['user' => $user], ['replies' => $replies])->with('message', $message);
    }

    public function edit($id)
    {
        $message = messages::find($id);
        return view('messages.edit')->with('message', $message);
    }

    public function update(Request $request, $id)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }

        $request->validate([
            'text' => 'required|max:150'
        ]);

        $message = messages::find($id);
        $message->text = $request->input('text');
        $message->save();

        return redirect('/messages')->with('success', 'Message updated');
    }

    public function destroy($id)
    {
        $message = messages::find($id);

        if(!is_null($message->cover_image)){
            Storage::delete('public/cover_images/'.$message->cover_image);
        }

        $message->delete();
        return redirect('/messages')->with('success', 'Message has been deleted');
    }
}
