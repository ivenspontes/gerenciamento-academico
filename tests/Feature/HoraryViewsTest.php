<?php

namespace Tests\Feature;

use App\Models\Horary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HoraryViewsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if index view can be rendered
     *
     * @return void
     */
    public function test_a_horary_index_view_can_be_rendered()
    {
        $view = $this->view('horary.index');

        $view->assertSee('Horários');
    }

    /**
     * Test if index view is showing data
     *
     * @return void
     */
    public function test_if_horary_index_view_is_showing_horaries()
    {
        $horaries = Horary::factory(10)->create();

        $view = $this->view('horary.index', ['horaries' => $horaries]);

        foreach ($horaries as $horary) {
            $view->assertSee($horary->name);
            $view->assertSee($horary->cpf);
            $view->assertSee($horary->birth_date);
        }
    }

    /**
     * Test if show view can retrieve data
     *
     * @return void
     */
    public function test_if_horary_show_view_can_retrieve_horary()
    {
        $horary = Horary::factory()->create();

        $view = $this->view('horary.show', ['horary' => $horary]);

        $view->assertSee($horary->teacher->name);
        $view->assertSee($horary->discipline->name);
        $view->assertSee($horary->weekday);
        $view->assertSee($horary->start_time);
        $view->assertSee($horary->end_time);
    }

    /**
     * Test if edit view can retrieve data
     *
     * @return void
     */
    public function test_if_horary_edit_view_retrieve_horary()
    {
        $horary = Horary::factory()->create();

        // dd($horary->discipline);

        $view = $this->view('horary.edit', ['horary' => $horary]);


        $view->assertSee($horary->teacher->name);
        $view->assertSee($horary->discipline->name);
        $view->assertSee($horary->weekday);
        $view->assertSee($horary->start_time);
        $view->assertSee($horary->end_time);
    }

    /**
     * Test if create view can be rendered
     *
     * @return void
     */
    public function test_if_horary_create_view_can_be_rendered()
    {
        $view = $this->view('horary.create');

        $view->assertSee('Criar horário');
        $view->assertSee('Disciplina:');
        $view->assertSee('Dia da semana:');
        $view->assertSee('Horário de início:');
        $view->assertSee('Horário de término:');
    }
}
