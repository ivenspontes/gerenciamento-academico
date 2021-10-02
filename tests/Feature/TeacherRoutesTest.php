<?php

namespace Tests\Feature;

use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class TeacherRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index route is accessible
     *
     * @return void
     */
    public function test_if_teacher_index_route_is_accessible()
    {
        $response = $this->get(route('teacher.index'));

        $response->assertStatus(200);
    }

    /**
     * Test if create route is accessible
     *
     * @return void
     */
    public function test_if_teacher_create_route_is_accessible()
    {
        $response = $this->get(route('teacher.create'));

        $response->assertStatus(200);
        $response->assertSee('Nome:');
        $response->assertSee('CPF:');
        $response->assertSee('Data de nascimento:');
    }

    /**
     * Test if store route can create
     *
     * @return void
     */
    public function test_if_teacher_store_route_can_create_teacher()
    {
        $teacher = Teacher::factory()->make()->toArray();

        $response = $this->post(route('teacher.store', $teacher));

        $this->assertDatabaseHas('teachers', $teacher);
        $response->assertStatus(302);
    }

    /**
     * Test if show route can retrieve data
     *
     * @return void
     */
    public function test_if_teacher_show_route_can_retrieve_teacher()
    {
        $teacher = Teacher::factory()->create();

        $response = $this->get(route('teacher.show', $teacher->id));

        $response->assertStatus(200);
        $response->assertSeeInOrder($teacher->only('name','cpf','birth_date'));
    }

    /**
     * Test if edit route can retrieve data
     *
     * @return void
     */
    public function test_if_teacher_edit_route_can_retrieve_teacher()
    {
        $teacher = Teacher::factory()->create();

        $response = $this->get(route('teacher.edit', ['teacher' =>$teacher->id]));

        $response->assertStatus(200);
        $response->assertSeeInOrder($teacher->only('name','cpf','birth_date'));
    }

    /**
     * Test if update route can modify
     *
     * @return void
     */
    public function test_if_teacher_update_route_can_modify_teacher()
    {
        $teacher = Teacher::factory()->create();

        $teacherBeforeUpdate = $teacher->only('name','cpf','birth_date');

        $teacherFaker = Teacher::factory()->make()->toArray();

        $response = $this->put(route('teacher.update', ['teacher' => $teacher->id]), $teacherFaker,);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('teachers', $teacherBeforeUpdate);
        $this->assertDatabaseHas('teachers', $teacherFaker);
    }

    /**
     * Test if destroy route can remove
     *
     * @return void
     */
    public function test_if_teacher_destroy_route_can_remove_teacher()
    {
        $teacher = Teacher::factory()->create();

        $response = $this->delete(route('teacher.destroy', ['teacher' => $teacher->id]));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('teachers', $teacher->toArray());
        $this->assertDeleted('teachers', $teacher->toArray());
    }
}
