<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Score;
use App\Role;
use App\Balance;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scores(){
        return $this->hasMany(Score::class);
    }

    public function balances() {
        return $this->hasMany(Balance::class);
    }

    public function role(){
        return $this->hasOne(Role::class);
    }

    public function usCredits() {
        return $this->total_credits / 20;
    }

    public function mxCredits() {
        return  $this->usCredits() * 25;
    }
}
