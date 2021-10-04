<?php

namespace Tests\Feature;

use App\Models\Classroom;
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

    // /**
    //  * Test if model can attach teacher
    //  *
    //  * @return void
    //  */
    // public function test_if_teacher_can_attach_classroom()
    // {
    //     $discipline = Classroom::factory()->create();
    //     $teacher = Teacher::factory()->create();

    //     $discipline->teachers()->attach($teacher);

    //     $this->assertCount(1, $discipline->fresh()->teachers);
    //     $this->assertTrue($discipline->teachers()->first()->is($teacher));
    // }
}
