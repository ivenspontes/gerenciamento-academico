<?php

namespace App\Http\Controllers;

use App\Http\Requests\HoraryRequest;
use App\Models\Discipline;
use App\Models\Grid;
use App\Models\Horary;
use App\Models\Teacher;
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
        $teachers = Teacher::all();
        $disciplines = Discipline::all();
        $grids = Grid::all();

        return view('horary.create', compact(['teachers', 'disciplines', 'grids']));
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
        flash('Horário criado com sucesso!')->success();
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
        $teachers = Teacher::all();
        $disciplines = Discipline::all();
        $grids = Grid::all();

        return view('horary.show', compact(['horary', 'teachers', 'disciplines', 'grids']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horary  $horary
     * @return \Illuminate\Http\Response
     */
    public function edit(Horary $horary)
    {
        $teachers = Teacher::all();
        $disciplines = Discipline::all();
        $grids = Grid::all();

        return view('horary.edit', compact(['horary', 'teachers', 'disciplines', 'grids']));
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
        flash('Horário editado com sucesso!')->success();
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
        flash('Horário deletado com sucesso!')->error();
        return back();
    }
}
