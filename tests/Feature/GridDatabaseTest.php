<?php

namespace Tests\Feature;

use App\Models\Grid;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GridDatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if model can create
     *
     * @return void
     */
    public function test_if_grid_can_be_created()
    {
        $grid = Grid::factory()->create();

        $this->assertDatabaseHas('grids', $grid->only('name'));
    }

    /**
     * Test if model can update
     *
     * @return void
     */
    public function test_if_grid_can_be_updated()
    {
        $grid = Grid::factory()->create();

        $gridBeforeUpdate = $grid->toArray();

        $grid->update(Grid::factory()->make()->toArray());

        $this->assertDatabaseMissing('grids', $gridBeforeUpdate);
        $this->assertDatabaseHas('grids', $grid->only('name'));
    }

    /**
     * Test if model can delete
     *
     * @return void
     */
    public function test_if_grid_can_be_deleted()
    {
        $grid = Grid::factory()->create();

        $grid->delete();

        $this->assertDeleted('grids', $grid->only('name'));
    }

    // /**
    //  * Test if model can attach teacher
    //  *
    //  * @return void
    //  */
    // public function test_if_relationship_students_is_working()
    // {
    //     $grid = Grid::factory()->create();

    //     $student = Student::factory(['classroom_id' => null])->make()->toArray();

    //     $student = $grid->students()->create($student);

    //     $this->assertDatabaseHas('students', $student->makeHidden(['created_at','updated_at'])->toArray());
    //     $this->assertTrue(($grid->id == $student->classroom->id));
    // }
}
