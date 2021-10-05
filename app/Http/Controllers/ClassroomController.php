<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Discipline;
use App\Models\Teacher;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classroom.index', compact(['classrooms']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('classroom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ClassroomRequest  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(ClassroomRequest $request)
    {
        Classroom::create($request->validated());
        flash('Turma criada com sucesso!')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classroom
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Classroom $classroom)
    {
        $grid = $classroom->grid;

        $teachers = null;
        $disciplines = null;
        $gridsWeek = null;

        if (!is_null($grid)) {
            $teachersGroup = $grid->horaries->groupBy('teacher_id');
            $disciplinesGroup = $grid->horaries->groupBy('discipline_id');
            foreach ($teachersGroup as $key => $value) {
                $teachers[] = Teacher::find($key);
            }

            foreach ($disciplinesGroup as $key => $value) {
                $disciplines[] = Discipline::find($key);
            }

            // order grids by days
            $gridsWeek = $classroom->grid->horaries->sortBy(['weekday', 'start_time'])->groupBy('weekday')->toArray();
            if ($gridsWeek) {
                $sunday = $gridsWeek['Domingo'];
                unset($gridsWeek['Domingo']);
                $gridsWeek['Domingo'] = $sunday;
            }
        }



        return view('classroom.show', compact(['classroom', 'teachers', 'disciplines', 'gridsWeek']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classroom
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Classroom $classroom)
    {
        return view('classroom.edit', compact(['classroom']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ClassroomRequest  $request
     * @param  \App\Models\ClassRoom  $classroom
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(ClassroomRequest $request, Classroom $classroom)
    {
        $classroom->update($request->validated());
        flash('Turma editada com sucesso!')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classroom
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        flash('Turma deletada com sucesso!')->error();
        return back();
    }
}
