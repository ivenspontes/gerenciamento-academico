<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentViewsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index view can be rendered
     *
     * @return void
     */
    public function test_a_student_index_view_can_be_rendered()
    {
        $view = $this->view('student.index');

        $view->assertSee('Estudantes');
    }

    /**
     * Test if index view is showing data
     *
     * @return void
     */
    public function test_if_student_index_view_is_showing_students()
    {
        $students = Student::factory(10)->create();

        $view = $this->view('student.index', ['students' => $students]);

        foreach ($students as $student) {
            $view->assertSee($student->name);
            $view->assertSee($student->cpf);
            $view->assertSee($student->birth_date);
        }
    }

    /**
     * Test if show view can retrieve data
     *
     * @return void
     */
    public function test_if_student_show_view_can_retrieve_student()
    {
        $student = Student::factory()->create();

        $view = $this->view('student.show', ['student' => $student]);

        $view->assertSee($student->name);
        $view->assertSee($student->cpf);
        $view->assertSee($student->birth_date);
    }

    /**
     * Test if edit view can retrieve data
     *
     * @return void
     */
    public function test_if_student_edit_view_retrieve_student()
    {
        $student = Student::factory()->create();

        $view = $this->view('student.edit', ['student' => $student]);

        $view->assertSee($student->name);
        $view->assertSee($student->cpf);
        $view->assertSee($student->birth_date);
    }

    /**
     * Test if create view can be rendered
     *
     * @return void
     */
    public function test_if_student_create_view_can_be_rendered()
    {
        $view = $this->view('student.create');

        $view->assertSee('Criar estudante');
        $view->assertSee('Nome:');
        $view->assertSee('CPF:');
        $view->assertSee('Data de nascimento:');
    }
}
