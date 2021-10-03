<?php

namespace App\Http\Controllers;

use App\Http\Requests\HoraryRequest;
use App\Models\Horary;
use Illuminate\Http\Request;

class HoraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horaries = Horary::all();
        return view('horary.index', compact(['horaries']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HoraryRequest $request)
    {
        $horary = Horary::create($request->validated());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horary  $horary
     * @return \Illuminate\Http\Response
     */
    public function show(Horary $horary)
    {
        return view('horary.show', compact(['horary']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horary  $horary
     * @return \Illuminate\Http\Response
     */
    public function edit(Horary $horary)
    {
        return view('horary.edit', compact(['horary']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horary  $horary
     * @return \Illuminate\Http\Response
     */
    public function update(HoraryRequest $request, Horary $horary)
    {
        $horary->update($request->validated());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horary  $horary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horary $horary)
    {
        $horary->delete();
        return back();
    }
}
