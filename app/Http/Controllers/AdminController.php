<?php

namespace App\Http\Controllers;

use App\Models\BillingType;
use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    public function index()
    {
        return view('dashboard.index');
    }
    public function show_users()
    {
        $users = User::all();
        return view('dashboard.user',['users'=>$users]);
    }
    public function view(){
        $bills = BillingType::all();
        $subs = SubscriptionType::all();
        return view('dashboard.pages-pricing',['bills'=>$bills,'subs'=>$subs]);
    }
    public function store(Request $request){
        $i = 0;
        $type = request('type');
        $rate = request('rate');
        foreach ($type as $typ) {
            SubscriptionType::where('id', $type[$i])
                ->update(array(
                    'charge' => $rate[$i]
                ));
            $i = $i+1;
        }
        return back()->with('success','Rates saved successfully');
    }
}
