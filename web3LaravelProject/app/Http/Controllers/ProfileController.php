<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();

        return view('profile.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        if (Auth::user()->id == $id) {

        $user = User::find($id);
        return view('profile.show', compact('user'));
        }
        else
        {
            return redirect('/messages');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    
    {
        if (!Auth::check())
        {
            return redirect('/login');
        }
        else
        {
        $user = User::find($id);
        return view('profile.edit', compact('user'));  
        }      
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
        if (!Auth::check())
        {
            return redirect('/login');
        }
        else
        {
         $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'image'=>'required'
        ]);

        $user = User::find($id);
        $user->first_name =  $request->get('first_name');
        $user->last_name =  $request->get('last_name');
        $user->email = $request->get('email');

        //Used for storing image path in public/images
        $image = $request->file('image');
        $path = public_path(). '/images/';
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move($path, $filename);
        $user->profile_image_path = $filename;

        $user->save();

        return redirect('/profile')->with('success', 'User updated!');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::check())
        {
            return redirect('/login');
        }
        else
        {
        $user = User::find($id);
        $user->delete();

        return redirect('/profile')->with('success', 'User deleted!');
        }
    }
}
