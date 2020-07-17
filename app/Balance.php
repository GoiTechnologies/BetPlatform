<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Score;
use App\User;

class Balance extends Model
{
    //
    public function scores(){
        return $this->hasMany(Score::class);
    }
    
    public function user(){
        return $this->hasOne(User::class);
    }
}
