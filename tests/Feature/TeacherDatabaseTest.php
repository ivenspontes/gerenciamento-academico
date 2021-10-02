<?php

namespace Tests\Feature;

use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeacherDatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if model can create
     *
     * @return void
     */
    public function test_if_teacher_can_be_created()
    {
        $teacher = Teacher::factory()->create();

        $this->assertDatabaseHas('teachers', $teacher->only('name','cpf','birth_date'));
    }

    /**
     * Test if model can update
     *
     * @return void
     */
    public function test_if_teacher_can_be_updated()
    {
        $teacher = Teacher::factory()->create();

        $teacherBeforeUpdate = $teacher->toArray();

        $teacher->update(Teacher::factory()->make()->toArray());

        $this->assertDatabaseMissing('teachers', $teacherBeforeUpdate);
        $this->assertDatabaseHas('teachers', $teacher->only('name','cpf','birth_date'));
    }

    /**
     * Test if model can delete
     *
     * @return void
     */
    public function test_if_teacher_can_be_deleted()
    {
        $teacher = Teacher::factory()->create();

        $teacher->delete();

        $this->assertDeleted('teachers', $teacher->only('name','cpf','birth_date'));
    }
}
