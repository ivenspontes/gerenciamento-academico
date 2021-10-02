<?php

namespace Tests\Feature;

use App\Models\Discipline;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DisciplineRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index route is accessible
     *
     * @return void
     */
    public function test_if_discipline_index_route_is_accessible()
    {
        $response = $this->get(route('discipline.index'));

        $response->assertStatus(200);
    }

    /**
     * Test if create route is accessible
     *
     * @return void
     */
    public function test_if_discipline_create_route_is_accessible()
    {
        $response = $this->get(route('discipline.create'));

        $response->assertStatus(200);
        $response->assertSee('Nome:');
    }

    /**
     * Test if store route can create
     *
     * @return void
     */
    public function test_if_discipline_store_route_can_create_discipline()
    {
        $discipline = Discipline::factory()->make()->toArray();

        $response = $this->post(route('discipline.store', $discipline));

        $this->assertDatabaseHas('disciplines', $discipline);
        $response->assertStatus(302);
    }

    /**
     * Test if show route can retrieve data
     *
     * @return void
     */
    public function test_if_discipline_show_route_can_retrieve_discipline()
    {
        $discipline = Discipline::factory()->create();

        $response = $this->get(route('discipline.show', $discipline->id));

        $response->assertStatus(200);
        $response->assertSeeInOrder($discipline->only('name'));
    }

    /**
     * Test if edit route can retrieve data
     *
     * @return void
     */
    public function test_if_discipline_edit_route_can_retrieve_discipline()
    {
        $discipline = Discipline::factory()->create();

        $response = $this->get(route('discipline.edit', ['discipline' =>$discipline->id]));

        $response->assertStatus(200);
        $response->assertSeeInOrder($discipline->only('name'));
    }

    /**
     * Test if update route can modify
     *
     * @return void
     */
    public function test_if_discipline_update_route_can_modify_discipline()
    {
        $discipline = Discipline::factory()->create();

        $disciplineBeforeUpdate = $discipline->only('name');

        $disciplineFaker = Discipline::factory()->make()->toArray();

        $response = $this->put(route('discipline.update', ['discipline' => $discipline->id]), $disciplineFaker,);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('disciplines', $disciplineBeforeUpdate);
        $this->assertDatabaseHas('disciplines', $disciplineFaker);
    }

    /**
     * Test if destroy route can remove
     *
     * @return void
     */
    public function test_if_discipline_destroy_route_can_remove_discipline()
    {
        $discipline = Discipline::factory()->create();

        $response = $this->delete(route('discipline.destroy', ['discipline' => $discipline->id]));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('disciplines', $discipline->toArray());
        $this->assertDeleted('disciplines', $discipline->toArray());
    }
}
