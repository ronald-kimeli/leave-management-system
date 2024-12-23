<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    public function home()
    {
        $user = Auth::user();
        if ($user->role_as == '1') {
          return redirect('admin/dashboard')->with(['status' => 'Already logged in', 'status_code' => 'success']);
        } else if ($user->role_as == '0') {
          return redirect('show/applyleave')->with(['status' => ' Logged In Successful', 'status_code' => 'success']);
        }
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Pages.index');
    }
}
