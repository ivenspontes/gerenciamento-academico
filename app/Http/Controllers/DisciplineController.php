<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplineRequest;
use App\Models\Discipline;
use App\Models\Teacher;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Discipline::all();
        return view('discipline.index', compact(['disciplines']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('discipline.create', compact(['teachers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplineRequest $request)
    {
        $discipline = Discipline::create($request->validated());

        if ($request->has('teachers')) {
            $discipline->teachers()->sync($request->teachers);
        } else {
            $discipline->teachers()->sync([]);
        }
        flash('Disciplina criada com sucesso!')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function show(Discipline $discipline)
    {
        return view('discipline.show', compact(['discipline']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function edit(Discipline $discipline)
    {
        $teachers = Teacher::all();
        return view('discipline.edit', compact(['discipline', 'teachers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplineRequest $request, Discipline $discipline)
    {
        $discipline->update($request->validated());
        if ($request->has('teachers')) {
            $discipline->teachers()->sync($request->teachers);
        } else {
            $discipline->teachers()->sync([]);
        }
        flash('Disciplina editada com sucesso!')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discipline $discipline)
    {
        $discipline->delete();
        flash('Disciplina deletada com sucesso!')->danger();
        return back();
    }
}
