<?php

namespace Tests\Feature;

use App\Models\Classroom;
use App\Models\Grid;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GridViewsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index view can be rendered
     *
     * @return void
     */
    public function test_a_grid_index_view_can_be_rendered()
    {
        $view = $this->view('grid.index');

        $view->assertSee('Grades de horários');
    }

    /**
     * Test if index view is showing data
     *
     * @return void
     */
    public function test_if_grid_index_view_is_showing_grids()
    {
        $grids = Grid::factory(10)->create();

        $view = $this->view('grid.index', ['grids' => $grids]);

        foreach ($grids as $grid) {
            $view->assertSee($grid->name);
        }
    }

    /**
     * Test if show view can retrieve data
     *
     * @return void
     */
    public function test_if_grid_show_view_can_retrieve_grid()
    {
        $grid = Grid::factory()->create();

        $view = $this->view('grid.show', ['grid' => $grid]);

        $view->assertSee($grid->name);

    }
    /**
     * Test if edit view can retrieve data
     *
     * @return void
     */
    public function test_if_grid_edit_view_retrieve_grid()
    {
        $grid = Grid::factory()->create();

        $view = $this->view('grid.edit', ['grid' => $grid]);

        $view->assertSee($grid->name);
    }

    /**
     * Test if create view can be rendered
     *
     * @return void
     */
    public function test_if_grid_create_view_can_be_rendered()
    {
        $classrooms = Classroom::all();
        $view = $this->view('grid.create', ['classrooms' => $classrooms]);

        $view->assertSee('Criar grade de horário');
        $view->assertSee('Nome:');
        $view->assertSee('Turma:');
    }
}
