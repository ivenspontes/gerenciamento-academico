<?php

namespace App\Http\Controllers;

use App\Http\Requests\GridRequest;
use App\Models\Classroom;
use App\Models\Grid;
use Illuminate\Http\Request;

class GridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grids = Grid::all();
        return view('grid.index', compact(['grids']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();
        return view('grid.create', compact(['classrooms']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GridRequest $request)
    {
        Grid::create($request->validated());
        flash('Grade criada com sucesso!')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grid  $grid
     * @return \Illuminate\Http\Response
     */
    public function show(Grid $grid)
    {
        $classrooms = Classroom::all();
        return view('grid.show', compact(['grid', 'classrooms']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grid  $grid
     * @return \Illuminate\Http\Response
     */
    public function edit(Grid $grid)
    {
        return view('grid.edit', compact(['grid']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grid  $grid
     * @return \Illuminate\Http\Response
     */
    public function update(GridRequest $request, Grid $grid)
    {
        $grid->update($request->validated());
        flash('Grade editada com sucesso!')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grid  $grid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grid $grid)
    {
        $grid->delete();
        flash('Grade deletada com sucesso!')->danger();
        return back();
    }
}
