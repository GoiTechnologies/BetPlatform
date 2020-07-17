<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Game;
class Score extends Model
{
    //
    public function user(){
        return $this->hasOne(User::class);
    }

    public function game(){
        return $this->hasOne(Game::class);

    }
}
