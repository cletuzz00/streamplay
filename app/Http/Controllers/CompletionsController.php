<?php

namespace App\Http\Controllers;

use App\Models\UserBill;
use App\Models\UserBillPayment;
use App\Models\Video;
use App\Models\VideoCompletion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompletionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(Auth::user()->hasSubscription()->exists()){
            $bill = UserBill::where('user_id',Auth::user()->id)->first();
            $bill_type = $bill->bill_id;
            if($bill_type == 2){
                $valid = UserBillPayment::where('user_id',Auth::user()->id)->where('bill_type',2)->where('valid_until','>=',Carbon::today())->get();
                if (count($valid)<1||$valid==null) {
                    return back()->with('error','You have no active subscription payment, please make a payment to continue');
                } else {
                    return view('user.play');
                }
            }
            else{
             return view('user.play');
            }
        }
        else{
            return back()->with('error','You have no active subscription to watch this, renew your subscription to continue');
        }
    }
    public function store(Request $request)
    {
        // $video = Video::findOrFail($request->videoId);
        $time_watched = $request->totalTime;
        $watched = new VideoCompletion();
        $watched->user_id=Auth::user()->id;
        $watched->video_id = 1;
        $watched->time_played = $time_watched;
        $watched->bill_id = Auth::user()->hasSubscription->bill_id;
        $watched->sub_id = Auth::user()->hasSubscription->subscription_id;
        $watched->cost = Auth::user()->hasSubscription->subscription_type->charge;
        $watched->save();


    }
}
