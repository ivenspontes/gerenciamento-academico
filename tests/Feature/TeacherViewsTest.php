<?php

namespace Tests\Feature;

use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeacherViewsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index view can be rendered
     *
     * @return void
     */
    public function test_a_teacher_index_view_can_be_rendered()
    {
        $view = $this->view('teacher.index');

        $view->assertSee('Professores');
    }

    /**
     * Test if index view is showing data
     *
     * @return void
     */
    public function test_if_teacher_index_view_is_showing_teachers()
    {
        $teachers = Teacher::factory(10)->create();

        $view = $this->view('teacher.index', ['teachers' => $teachers]);

        foreach ($teachers as $teacher) {
            $view->assertSee($teacher->name);
            $view->assertSee($teacher->cpf);
            $view->assertSee($teacher->birth_date);
        }
    }

    /**
     * Test if show view can retrieve data
     *
     * @return void
     */
    public function test_if_teacher_show_view_can_retrieve_teacher()
    {
        $teacher = Teacher::factory()->create();

        $view = $this->view('teacher.show', ['teacher' => $teacher]);

        $view->assertSee($teacher->name);
        $view->assertSee($teacher->cpf);
        $view->assertSee($teacher->birth_date);
    }

    /**
     * Test if edit view can retrieve data
     *
     * @return void
     */
    public function test_if_teacher_edit_view_retrieve_teacher()
    {
        $teacher = Teacher::factory()->create();

        $view = $this->view('teacher.edit', ['teacher' => $teacher]);

        $view->assertSee($teacher->name);
        $view->assertSee($teacher->cpf);
        $view->assertSee($teacher->birth_date);
    }

    /**
     * Test if create view can be rendered
     *
     * @return void
     */
    public function test_if_teacher_create_view_can_be_rendered()
    {
        $view = $this->view('teacher.create');

        $view->assertSee('Criar professor');
        $view->assertSee('Nome:');
        $view->assertSee('CPF:');
        $view->assertSee('Data de nascimento:');
    }
}
