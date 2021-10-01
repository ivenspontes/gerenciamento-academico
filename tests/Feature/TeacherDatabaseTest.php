<?php

namespace Tests\Feature;

use App\Models\Teacher;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TeacherDatabaseTest extends TestCase
{
    use DatabaseMigrations;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_if_teacher_can_be_created()
    {
        $teacher = Teacher::factory()->create();
        $this->assertDatabaseHas('teachers', $teacher->toArray());
    }

    public function test_if_teacher_can_be_updated()
    {
        $teacher = Teacher::factory()->create();

        $teacherBeforeUpdate = $teacher->toArray();

        $teacher->update(Teacher::factory()->make()->toArray());

        $this->assertDatabaseMissing('teachers', $teacherBeforeUpdate);

        $this->assertDatabaseHas('teachers', $teacher->toArray());
    }

    public function test_if_teacher_can_be_deleted()
    {
        $teacher = Teacher::factory()->create();

        $this->assertDatabaseHas('teachers', $teacher->toArray());

        $teacher->delete();

        $this->assertDeleted('teachers', $teacher->toArray());
    }
}
