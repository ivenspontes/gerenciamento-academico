<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index route is accessible
     *
     * @return void
     */
    public function test_if_student_index_route_is_accessible()
    {
        $response = $this->get(route('student.index'));

        $response->assertStatus(200);
    }

    /**
     * Test if create route is accessible
     *
     * @return void
     */
    public function test_if_student_create_route_is_accessible()
    {
        $response = $this->get(route('student.create'));

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
    public function test_if_student_store_route_can_create_student()
    {
        $student = Student::factory()->make()->toArray();

        $response = $this->post(route('student.store', $student));

        $this->assertDatabaseHas('students', $student);
        $response->assertStatus(302);
    }

    /**
     * Test if show route can retrieve data
     *
     * @return void
     */
    public function test_if_student_show_route_can_retrieve_student()
    {
        $student = Student::factory()->create();

        $response = $this->get(route('student.show', $student->id));

        $response->assertStatus(200);
        $response->assertSeeInOrder($student->only('name','cpf','birth_date'));
    }

    /**
     * Test if edit route can retrieve data
     *
     * @return void
     */
    public function test_if_student_edit_route_can_retrieve_student()
    {
        $student = Student::factory()->create();

        $response = $this->get(route('student.edit', ['student' =>$student->id]));

        $response->assertStatus(200);
        $response->assertSeeInOrder($student->only('name','cpf','birth_date'));
    }

    /**
     * Test if update route can modify
     *
     * @return void
     */
    public function test_if_student_update_route_can_modify_student()
    {
        $student = Student::factory()->create();

        $studentBeforeUpdate = $student->only('name','cpf','birth_date');

        $studentFaker = Student::factory()->make()->toArray();

        $response = $this->put(route('student.update', ['student' => $student->id]), $studentFaker);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('students', $studentBeforeUpdate);
        $this->assertDatabaseHas('students', $studentFaker);
    }

    /**
     * Test if destroy route can remove
     *
     * @return void
     */
    public function test_if_student_destroy_route_can_remove_student()
    {
        $student = Student::factory()->create();

        $response = $this->delete(route('student.destroy', ['student' => $student->id]));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('students', $student->toArray());
        $this->assertDeleted('students', $student->toArray());
    }
}
