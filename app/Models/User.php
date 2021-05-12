<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this
            ->belongsTo(Role::class,'role_id');
    }
    public function hasRole($role)
    {
      if ($this->roles()->where('name', $role)->first()) {
        return true;
      }
      return false;
    }
    public function name(){
        return $this->name;
    }
    public function complete(Video $video)
    {
        $this->completions()->attach($video);
    }

    /**
     * A user can complete videos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function completions()
    {
        return $this->belongsToMany(Video::class, 'video_completions')->withTimestamps();
    }
    public function hasSubscription()
    {
        return $this->hasOne(UserBill::class,'user_id');
    }
    public function hasCreditCard()
    {
        return $this->hasOne(UserCreditCard::class,'user_id');
    }
}
