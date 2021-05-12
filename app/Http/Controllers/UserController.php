<?php

namespace App\Http\Controllers;

use App\Models\BillingType;
use App\Models\CreditCard;
use App\Models\SubscriptionType;
use App\Models\UserBill;
use App\Models\UserBillPayment;
use App\Models\UserCreditCard;
use Carbon\Carbon;
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
        if(request('subscription_type')==1){
            return back()->with('error','Billing starts from Daily, ammend that to continue');
        }
        UserBill::updateOrCreate(
            ['user_id'=>Auth::user()->id],
            ['bill_id'=>request('billing_type'),'subscription_id'=>request('subscription_type')]
        );
        return back()->with('success','Updated successfully');
    }
    public function creditcard()
    {
        $user_card = UserCreditCard::where('user_id',Auth::user()->id)->first();
        return view('user.manage-profile',['user_card'=>$user_card]);
    }
    public function addcreditcard(Request $request){
        $existing = CreditCard::where('number',request('number'))->first();
        if($existing){
            if($existing->cvv != request('cvv') || $existing->name != request('name') || $existing->expiry != request('expiry')){
                return back()->with('error','Card details do not match, please correct that to proceed');
            }
            UserCreditCard::updateOrCreate(
                ['user_id'=>Auth::user()->id],
                ['name'=>request('name'),'expiry'=>request('expiry'),'cvv'=>request('cvv'),'number'=>request('number')]
            );
        }
        else{
            return back()->with('error','Card Number does not exist');
        }
        return back()->with('success','Card saved successfully');
    }
    public function makepayment(Request $request){
        $payment = new UserBillPayment;
        $payment->user_id = Auth::user()->id;
            $payment->bill_type = Auth::user()->hasSubscription->bill_id;
            $payment->subscription_type = Auth::user()->hasSubscription->subscription_id;
            $payment->credit = request('amount');
            $payment->valid_until = Carbon::now()->addDays(30);
            $payment->save();
        return back()->with('success','payment made was successful');
    }
    public function statement(){
        $bills = UserBillPayment::where('user_id',Auth::user()->id)->get();
        return view('user.statement',['bills'=>$bills]);
    }
}
