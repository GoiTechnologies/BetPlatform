<?php

namespace App\Http\Controllers;

use App\Balance;
use Illuminate\Http\Request;
use Auth;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$balances = \App\Balance::where('user_id', '=', Auth::user()->id)->paginate(2);
        
        $balances = Auth::user()->balances()->paginate(10);
        //dd($balances);
        return view('balances', ['isGame' => false, 'balances' => $balances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balance $balance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balance $balance)
    {
        //
    }
    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();
        
        \Log::info($input);

        return response()->json(['total_credits'=> Auth::user()->total_credits]);
    }
    public function ajaxRequestInsert(Request $request){
        $input = $request->all();
        //\Log::info($input);
        //dd($input);
        $user = Auth::user();
        $balance = new Balance();
        $balance->user_id = $user->id;
        $balance->game_id = $input['game_id'];
        $balance->before_credits = $user->total_credits;
        $balance->after_credits = $user->total_credits + $input['update_credits'];
        if( $input['update_credits'] <= 0){
            $balance->lost_credits = $input['update_credits'];
            $balance->win_credits = 0;
        }else {
            $balance->win_credits = $input['update_credits'];
            $balance->lost_credits = 0;
        }
        $balance->save();
        $user->total_credits = $balance->after_credits;
        $user->save();

        
        return response()->json(['success'=> 1]);
    }
}
