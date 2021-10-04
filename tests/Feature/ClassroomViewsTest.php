<?php

namespace Tests\Feature;

use App\Models\Classroom;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClassroomViewsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index view can be rendered
     *
     * @return void
     */
    public function test_a_classroom_index_view_can_be_rendered()
    {
        $view = $this->view('classroom.index');

        $view->assertSee('Turmas');
    }

    /**
     * Test if index view is showing data
     *
     * @return void
     */
    public function test_if_classroom_index_view_is_showing_classrooms()
    {
        $classrooms = Classroom::factory(10)->create();

        $view = $this->view('classroom.index', ['classrooms' => $classrooms]);

        foreach ($classrooms as $classroom) {
            $view->assertSee($classroom->name);
        }
    }

    /**
     * Test if show view can retrieve data
     *
     * @return void
     */
    public function test_if_classroom_show_view_can_retrieve_classroom()
    {
        $classroom = Classroom::factory()->create();

        $view = $this->view('classroom.show', ['classroom' => $classroom]);

        $view->assertSee($classroom->name);

    }
    /**
     * Test if edit view can retrieve data
     *
     * @return void
     */
    public function test_if_classroom_edit_view_retrieve_classroom()
    {
        $classroom = Classroom::factory()->create();

        $view = $this->view('classroom.edit', ['classroom' => $classroom]);

        $view->assertSee($classroom->name);
    }

    /**
     * Test if create view can be rendered
     *
     * @return void
     */
    public function test_if_classroom_create_view_can_be_rendered()
    {
        $view = $this->view('classroom.create');

        $view->assertSee('Criar turma');
        $view->assertSee('Nome:');
    }
}
