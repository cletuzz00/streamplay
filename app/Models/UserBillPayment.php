<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserBillPayment extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function activePayment()
    {
        $valid = UserBillPayment::where('user_id',Auth::user()->id)->where('valid_until','<=',Carbon::today())->get();
        return $valid;
    }
}
