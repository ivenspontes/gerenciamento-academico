<?php

namespace Tests\Feature;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClassroomDatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if model can create
     *
     * @return void
     */
    public function test_if_classroom_can_be_created()
    {
        $classroom = Classroom::factory()->create();

        $this->assertDatabaseHas('classrooms', $classroom->only('name'));
    }

    /**
     * Test if model can update
     *
     * @return void
     */
    public function test_if_classroom_can_be_updated()
    {
        $classroom = Classroom::factory()->create();

        $classroomBeforeUpdate = $classroom->toArray();

        $classroom->update(Classroom::factory()->make()->toArray());

        $this->assertDatabaseMissing('classrooms', $classroomBeforeUpdate);
        $this->assertDatabaseHas('classrooms', $classroom->only('name'));
    }

    /**
     * Test if model can delete
     *
     * @return void
     */
    public function test_if_classroom_can_be_deleted()
    {
        $classroom = Classroom::factory()->create();

        $classroom->delete();

        $this->assertDeleted('classrooms', $classroom->only('name'));
    }

    /**
     * Test if model can attach teacher
     *
     * @return void
     */
    public function test_if_relationship_students_is_working()
    {
        $classroom = Classroom::factory()->create();

        $student = Student::factory(['classroom_id' => null])->make()->toArray();

        $student = $classroom->students()->create($student);

        $this->assertDatabaseHas('students', $student->makeHidden(['created_at','updated_at'])->toArray());
        $this->assertTrue(($classroom->id == $student->classroom->id));
    }
}
