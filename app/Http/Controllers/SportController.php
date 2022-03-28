<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSportRequest;
use App\Http\Requests\UpdateSportRequest;
use App\Models\Sport;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::all();
        return $this->respond($sports);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSportRequest $request)
    {
        $sport = Sport::create($request->validated());
        return $this->respond($sport, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        return $this->respond($sport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSportRequest  $request
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSportRequest $request, Sport $sport)
    {
        $sport->update($request->validated());
        return $this->respond($sport);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();
        return $this->respond('', 204);
    }
}
