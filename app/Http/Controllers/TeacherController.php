<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index', compact('teachers'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('teacher.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(TeacherRequest $request)
    {
        $teacher = Teacher::create($request->validated());
        return redirect()->route('teacher.index');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Teacher  $teacher
    * @return \Illuminate\Http\Response
    */
    public function show(Teacher $teacher)
    {
        return view('teacher.show', compact('teacher'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Teacher  $teacher
    * @return \Illuminate\Http\Response
    */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', compact('teacher'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Teacher  $teacher
    * @return \Illuminate\Http\Response
    */
    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());
        return back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Teacher  $teacher
    * @return \Illuminate\Http\Response
    */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return back();
    }
}
