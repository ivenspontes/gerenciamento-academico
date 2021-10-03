<?php

namespace Tests\Feature;

use App\Models\Horary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HoraryDatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if model can create
     *
     * @return void
     */
    public function test_if_horary_can_be_created()
    {
        $horary = Horary::factory()->create();

        $this->assertDatabaseHas('horaries', $horary->makeHidden(['created_at','updated_at'])->toArray());
    }

    /**
     * Test if model can update
     *
     * @return void
     */
    public function test_if_horary_can_be_updated()
    {
        $horary = Horary::factory()->create();

        $horaryBeforeUpdate = $horary->toArray();

        $horary->update(Horary::factory()->make()->toArray());

        $this->assertDatabaseMissing('horaries', $horaryBeforeUpdate);
        $this->assertDatabaseHas('horaries', $horary->makeHidden(['created_at','updated_at'])->toArray());
    }

    /**
     * Test if model can delete
     *
     * @return void
     */
    public function test_if_horary_can_be_deleted()
    {
        $horary = Horary::factory()->create();

        $horary->delete();

        $this->assertDeleted('horaries', $horary->makeHidden(['created_at','updated_at'])->toArray());
    }

    // /**
    //  * Test if model can attach discipline
    //  *
    //  * @return void
    //  */
    // public function test_if_horary_can_attach_discipline()
    // {
    //     $horary = Horary::factory()->create();
    //     $discipline = Discipline::factory()->create();

    //     $horary->disciplines()->attach($discipline);

    //     $this->assertCount(1, $horary->fresh()->disciplines);
    //     $this->assertTrue($horary->disciplines()->first()->is($discipline));
    // }
}
