<?php

namespace Tests\Feature;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentDatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if model can create
     *
     * @return void
     */
    public function test_if_student_can_be_created()
    {
        $student = Student::factory()->create();

        $this->assertDatabaseHas('students', $student->only('name','cpf','birth_date'));
    }

    /**
     * Test if model can update
     *
     * @return void
     */
    public function test_if_student_can_be_updated()
    {
        $student = Student::factory()->create();

        $studentBeforeUpdate = $student->toArray();

        $student->update(Student::factory()->make()->toArray());

        $this->assertDatabaseMissing('students', $studentBeforeUpdate);
        $this->assertDatabaseHas('students', $student->only('name','cpf','birth_date'));
    }

    /**
     * Test if model can delete
     *
     * @return void
     */
    public function test_if_student_can_be_deleted()
    {
        $student = Student::factory()->create();

        $student->delete();

        $this->assertDeleted('students', $student->only('name','cpf','birth_date'));
    }

    /**
     * Test if model can attach discipline
     *
     * @return void
     */
    public function test_if_student_can_return_classroom()
    {
        $student = Student::factory()->create();

        $this->assertNotNull($student->classroom);
    }

}
