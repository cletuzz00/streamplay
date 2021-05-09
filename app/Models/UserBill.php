<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBill extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function billing_type()
    {
        return $this
            ->belongsTo(BillingType::class,'bill_id');
    }
    public function subscription_type()
    {
        return $this
            ->belongsTo(SubscriptionType::class,'subscription_id');
    }
}
