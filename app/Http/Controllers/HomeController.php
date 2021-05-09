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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $role = Auth::user()->role_id;
        switch ($role) {
          case '1':
            return redirect()->route('admin');
            break;
          case '2':
            return redirect()->route('user');
            break;
          default:
            return back();
          break;
        }
    }
}
