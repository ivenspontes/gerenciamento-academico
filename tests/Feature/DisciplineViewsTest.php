<?php

namespace Tests\Feature;

use App\Models\Discipline;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DisciplineViewsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index view can be rendered
     *
     * @return void
     */
    public function test_a_discipline_index_view_can_be_rendered()
    {
        $view = $this->view('discipline.index');

        $view->assertSee('Disciplinas');
    }

    /**
     * Test if index view is showing data
     *
     * @return void
     */
    public function test_if_discipline_index_view_is_showing_disciplines()
    {
        $disciplines = Discipline::factory(10)->create();

        $view = $this->view('discipline.index', ['disciplines' => $disciplines]);

        foreach ($disciplines as $discipline) {
            $view->assertSee($discipline->name);
        }
    }

    /**
     * Test if show view can retrieve data
     *
     * @return void
     */
    public function test_if_discipline_show_view_can_retrieve_discipline()
    {
        $discipline = Discipline::factory()->create();

        $view = $this->view('discipline.show', ['discipline' => $discipline]);

        $view->assertSee($discipline->name);

    }
    /**
     * Test if edit view can retrieve data
     *
     * @return void
     */
    public function test_if_discipline_edit_view_retrieve_discipline()
    {
        $discipline = Discipline::factory()->create();

        $view = $this->view('discipline.edit', ['discipline' => $discipline]);

        $view->assertSee($discipline->name);
    }

    /**
     * Test if create view can be rendered
     *
     * @return void
     */
    public function test_if_discipline_create_view_can_be_rendered()
    {
        $view = $this->view('discipline.create');

        $view->assertSee('Criar disciplina');
        $view->assertSee('Nome:');
    }
}
