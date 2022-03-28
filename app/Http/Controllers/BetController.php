<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBetRequest;
use App\Http\Requests\UpdateBetRequest;
use App\Models\Bet;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bets = Bet::all();
        return $this->respond($bets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBetRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = $request->user()->id;
        $bet = Bet::create($validated);
        return $this->respond($bet, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function show(Bet $bet)
    {
        return $this->respond($bet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBetRequest  $request
     * @param  \App\Models\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBetRequest $request, Bet $bet)
    {
        $bet->update($request->validated());
        return $this->respond($bet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bet  $bet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bet $bet)
    {
        $bet->delete();
        return $this->respond('', 204);
    }
}
