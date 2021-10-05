<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Discipline;
use App\Models\Grid;
use App\Models\Horary;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $disciplines = Discipline::all();
        $classrooms = Classroom::all();
        $students = Student::all();
        $grids = Grid::all();
        $horaries = Horary::all();

        return view('dashboard', compact([
            'teachers', 'disciplines', 'classrooms', 'students',
            'grids', 'horaries',
        ]));
    }
}
