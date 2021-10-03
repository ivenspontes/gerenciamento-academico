<?php

namespace Tests\Feature;

use App\Models\Horary;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HoraryRoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index route is accessible
     *
     * @return void
     */
    public function test_if_horary_index_route_is_accessible()
    {
        $response = $this->get(route('horary.index'));

        $response->assertStatus(200);
    }

    /**
     * Test if create route is accessible
     *
     * @return void
     */
    public function test_if_horary_create_route_is_accessible()
    {
        $response = $this->get(route('horary.create'));

        $response->assertStatus(200);
        $response->assertSee('Criar horário');
        $response->assertSee('Professor:');
        $response->assertSee('Disciplina:');
        $response->assertSee('Dia da semana:');
        $response->assertSee('Horário de início:');
        $response->assertSee('Horário de término:');
    }

    /**
     * Test if store route can create
     *
     * @return void
     */
    public function test_if_horary_store_route_can_create_horary()
    {
        $horary = Horary::factory()->make()->toArray();

        $response = $this->post(route('horary.store', $horary));

        // dd($horary);
        $response->assertStatus(302);
        $this->assertDatabaseCount('horaries', 1);
    }

    /**
     * Test if show route can retrieve data
     *
     * @return void
     */
    public function test_if_horary_show_route_can_retrieve_horary()
    {
        $horary = Horary::factory()->create();

        $response = $this->get(route('horary.show', $horary->id));

        $response->assertStatus(200);
        $response->assertSee($horary->teacher->name);
        $response->assertSee($horary->discipline->name);
        $response->assertSee($horary->weekday);
        $response->assertSee($horary->start_time);
        $response->assertSee($horary->end_time);
    }

    /**
     * Test if edit route can retrieve data
     *
     * @return void
     */
    public function test_if_horary_edit_route_can_retrieve_horary()
    {
        $horary = Horary::factory()->create();

        $response = $this->get(route('horary.edit', ['horary' =>$horary->id]));

        $response->assertStatus(200);
        $response->assertSee($horary->teacher->name);
        $response->assertSee($horary->discipline->name);
        $response->assertSee($horary->weekday);
        $response->assertSee($horary->start_time);
        $response->assertSee($horary->end_time);
        // $response->assertSeeInOrder($horary->makeHidden(['created_at','updated_at'])->toArray());
    }

    /**
     * Test if update route can modify
     *
     * @return void
     */
    public function test_if_horary_update_route_can_modify_horary()
    {
        $horary = Horary::factory()->create();

        $horaryBeforeUpdate = $horary->makeHidden(['created_at','updated_at'])->toArray();

        $horaryFaker = Horary::factory()->make()->toArray();

        // dd($horaryFaker);

        $response = $this->put(route('horary.update', ['horary' => $horary->id]), $horaryFaker);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('horaries', $horaryBeforeUpdate);
        $this->assertDatabaseHas('horaries', $horaryFaker);
    }

    /**
     * Test if destroy route can remove
     *
     * @return void
     */
    public function test_if_horary_destroy_route_can_remove_horary()
    {
        $horary = Horary::factory()->create();

        $response = $this->delete(route('horary.destroy', ['horary' => $horary->id]));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('horaries', $horary->toArray());
        $this->assertDeleted('horaries', $horary->toArray());
    }
}
