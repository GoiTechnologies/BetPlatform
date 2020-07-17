<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Score;
use App\Balance;

class Game extends Model
{
    //
    public function scores(){
        return $this->hasMany(Score::class);
    }

    public function balances(){
        return $this->hasMany(Balance::class);
    }
}
