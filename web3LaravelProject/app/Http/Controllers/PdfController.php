<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\messages;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use PDF;

class PdfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    }

    public function downloadPdf(){
        
        $messages = messages::all();
        $pdf = PDF::loadView('pdf', compact('messages'));
        return $pdf->download('LaravelPosts.pdf');
    }
}
