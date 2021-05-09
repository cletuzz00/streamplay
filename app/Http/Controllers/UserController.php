<?php

namespace App\Http\Controllers;

use App\Models\BillingType;
use App\Models\SubscriptionType;
use App\Models\UserBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user');
    }
    public function index()
    {
        return view('user.index');
    }
    public function view()
    {
        $user_billing = UserBill::where('user_id',Auth::user()->id)->first();
        $bills = BillingType::all();
        $subs = SubscriptionType::all();
        return view('user.pricing-plan',['bills'=>$bills,'subs'=>$subs,'user_billing'=>$user_billing]);
    }
    public function store(Request $request){
        if(request('billing_type')==2 && request('subscription_type')==1){
            return back()->with('error','Reccuring Billing starts from Daily, ammend that to continue');
        }
        UserBill::updateOrCreate(
            ['user_id'=>Auth::user()->id],
            ['bill_id'=>request('billing_type'),'subscription_id'=>request('subscription_type')]
        );
        return back()->with('success','Updated successfully');
    }
}
