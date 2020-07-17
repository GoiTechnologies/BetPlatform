<?php

use Illuminate\Database\Seeder;
use App\Game;
class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $game = new Game();
        $game->name = "BlackJack";
        $game->save();

        $game = new Game();
        $game->name = "Poker";
        $game->save();

        $game = new Game();
        $game->name = "SlotFruit";
        $game->save();

        $game = new Game();
        $game->name = "Roulette";
        $game->save();

        $game = new Game();
        $game->name = "Craps";
        $game->save();
    }
}
