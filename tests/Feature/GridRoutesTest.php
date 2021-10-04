<?php

namespace Tests\Feature;

use App\Models\Grid;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GridRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index route is accessible
     *
     * @return void
     */
    public function test_if_grid_index_route_is_accessible()
    {
        $response = $this->get(route('grid.index'));

        $response->assertStatus(200);
    }

    /**
     * Test if create route is accessible
     *
     * @return void
     */
    public function test_if_grid_create_route_is_accessible()
    {
        $response = $this->get(route('grid.create'));

        $response->assertStatus(200);
        $response->assertSee('Nome:');
        $response->assertSee('Turma:');
    }

    /**
     * Test if store route can create
     *
     * @return void
     */
    public function test_if_grid_store_route_can_create_grid()
    {
        $grid = Grid::factory()->make()->toArray();

        $response = $this->post(route('grid.store', $grid));

        $this->assertDatabaseHas('grids', $grid);
        $response->assertStatus(302);
    }

    /**
     * Test if show route can retrieve data
     *
     * @return void
     */
    public function test_if_grid_show_route_can_retrieve_grid()
    {
        $grid = Grid::factory()->create();

        $response = $this->get(route('grid.show', $grid->id));

        $response->assertStatus(200);
        $response->assertSeeInOrder($grid->only('name'));
    }

    /**
     * Test if edit route can retrieve data
     *
     * @return void
     */
    public function test_if_grid_edit_route_can_retrieve_grid()
    {
        $grid = Grid::factory()->create();

        $response = $this->get(route('grid.edit', ['grid' => $grid->id]));

        $response->assertStatus(200);
        $response->assertSeeInOrder($grid->only('name'));
    }

    /**
     * Test if update route can modify
     *
     * @return void
     */
    public function test_if_grid_update_route_can_modify_grid()
    {
        $grid = Grid::factory()->create();

        $gridBeforeUpdate = $grid->only('name');

        $gridFaker = Grid::factory()->make()->toArray();

        $response = $this->put(route('grid.update', ['grid' => $grid->id]), $gridFaker);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('grids', $gridBeforeUpdate);
        $this->assertDatabaseHas('grids', $gridFaker);
    }

    /**
     * Test if destroy route can remove
     *
     * @return void
     */
    public function test_if_grid_destroy_route_can_remove_grid()
    {
        $grid = Grid::factory()->create();

        $response = $this->delete(route('grid.destroy', ['grid' => $grid->id]));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('grids', $grid->toArray());
        $this->assertDeleted('grids', $grid->toArray());
    }
}
