<?php

namespace Tests\Feature;

use App\Models\Discipline;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DisciplineDatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if model can create
     *
     * @return void
     */
    public function test_if_discipline_can_be_created()
    {
        $disclipline = Discipline::factory()->create();

        $this->assertDatabaseHas('disciplines', $disclipline->only('name'));
    }

    /**
     * Test if model can update
     *
     * @return void
     */
    public function test_if_discipline_can_be_updated()
    {
        $disclipline = Discipline::factory()->create();

        $discliplineBeforeUpdate = $disclipline->toArray();

        $disclipline->update(Discipline::factory()->make()->toArray());

        $this->assertDatabaseMissing('disciplines', $discliplineBeforeUpdate);
        $this->assertDatabaseHas('disciplines', $disclipline->only('name'));
    }

    /**
     * Test if model can delete
     *
     * @return void
     */
    public function test_if_discipline_can_be_deleted()
    {
        $disclipline = Discipline::factory()->create();

        $disclipline->delete();

        $this->assertDeleted('disciplines', $disclipline->only('name'));
    }

    /**
     * Test if model can attach teacher
     *
     * @return void
     */
    public function test_if_teacher_can_attach_discipline()
    {
        $discipline = Discipline::factory()->create();
        $teacher = Teacher::factory()->create();

        $discipline->teachers()->attach($teacher);

        $this->assertCount(1, $discipline->fresh()->teachers);
        $this->assertTrue($discipline->teachers()->first()->is($teacher));
    }
}
