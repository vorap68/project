<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // session()->flush();
        $categories = Category::all();
        return view('index',compact('categories'));
    }
    public function deleteLogin(){
        $user_id = Auth::user()->id;
      $success = User::destroy($user_id);
        if($success){
            return redirect()->route('home');
    }
}
}
