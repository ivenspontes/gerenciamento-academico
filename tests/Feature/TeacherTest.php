<?php

namespace Tests\Feature;

use App\Models\Teacher;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeacherTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_teacher_index_view_can_be_rendered()
    {
        $view = $this->view('teacher.index');

        $view->assertSee('Professores');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_teacher_index_view_showing_teachers()
    {
        $teachers = Teacher::factory(10)->create();
        $view = $this->view('teacher.index', ['teachers' => $teachers]);

        foreach ($teachers as $teacher) {
            $view->assertSee($teacher->name);
        }
    }
}
