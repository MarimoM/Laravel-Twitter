<?php

namespace App\Http\Controllers;

use App\messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = messages::join('users', 'users.id', '=', 'messages.user_id')
            ->select('messages.*', 'users.name') 
            ->orderBy('created_at', 'desc')   
            ->paginate(10);
        return view('messages.index', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check())
        {
            return redirect('/login');
        }

        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        $message = new messages;
        $message->text = $request->text;
        $message->user_id = auth()->User()->id;
        $message->cover_image = $fileNameToStore;
        $message->save();

        return redirect('/messages')->with('success', 'Message sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = messages::find($id);
        $user = User::find($message->user_id);
        return view('messages.show', ['user' => $user])->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = messages::find($id);
        return view('messages.edit')->with('message', $message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\messages  $messages
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = messages::find($id);
        $message->delete();
        return redirect('/messages')->with('success', 'Message has been deleted');
    }
}
