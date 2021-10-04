<?php

namespace Tests\Feature;

use App\Models\Classroom;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClassroomRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index route is accessible
     *
     * @return void
     */
    public function test_if_classroom_index_route_is_accessible()
    {
        $response = $this->get(route('classroom.index'));

        $response->assertStatus(200);
    }

    /**
     * Test if create route is accessible
     *
     * @return void
     */
    public function test_if_classroom_create_route_is_accessible()
    {
        $response = $this->get(route('classroom.create'));

        $response->assertStatus(200);
        $response->assertSee('Nome:');
    }

    /**
     * Test if store route can create
     *
     * @return void
     */
    public function test_if_classroom_store_route_can_create_classroom()
    {
        $classroom = Classroom::factory()->make()->toArray();

        $response = $this->post(route('classroom.store', $classroom));

        $this->assertDatabaseHas('classrooms', $classroom);
        $response->assertStatus(302);
    }

    /**
     * Test if show route can retrieve data
     *
     * @return void
     */
    public function test_if_classroom_show_route_can_retrieve_classroom()
    {
        $classroom = Classroom::factory()->create();

        $response = $this->get(route('classroom.show', $classroom->id));

        $response->assertStatus(200);
        $response->assertSeeInOrder($classroom->only('name'));
    }

    /**
     * Test if edit route can retrieve data
     *
     * @return void
     */
    public function test_if_classroom_edit_route_can_retrieve_classroom()
    {
        $classroom = Classroom::factory()->create();

        $response = $this->get(route('classroom.edit', ['classroom' => $classroom->id]));

        $response->assertStatus(200);
        $response->assertSeeInOrder($classroom->only('name'));
    }

    /**
     * Test if update route can modify
     *
     * @return void
     */
    public function test_if_classroom_update_route_can_modify_classroom()
    {
        $classroom = Classroom::factory()->create();

        $classroomBeforeUpdate = $classroom->only('name');

        $classroomFaker = Classroom::factory()->make()->toArray();

        $response = $this->put(route('classroom.update', ['classroom' => $classroom->id]), $classroomFaker);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('classrooms', $classroomBeforeUpdate);
        $this->assertDatabaseHas('classrooms', $classroomFaker);
    }

    /**
     * Test if destroy route can remove
     *
     * @return void
     */
    public function test_if_classroom_destroy_route_can_remove_classroom()
    {
        $classroom = Classroom::factory()->create();

        $response = $this->delete(route('classroom.destroy', ['classroom' => $classroom->id]));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('classrooms', $classroom->toArray());
        $this->assertDeleted('classrooms', $classroom->toArray());
    }
}
