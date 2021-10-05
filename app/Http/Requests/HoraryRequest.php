<?php

namespace App\Http\Requests;

use App\Models\Grid;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class HoraryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(2);

        return [
            'name' => 'required|unique:horaries,name,'.$id.',id',
            'teacher_id' => 'required|exists:teachers,id',
            'discipline_id' => 'required|exists:disciplines,id',
            'grid_id' => ['required','exists:grids,id',
            function ($attribute, $value, $fail) {
                $grid = Grid::find($value);
                $startTime = Carbon::parse($this->input('start_time'));
                $endTime = Carbon::parse($this->input('end_time'));

                foreach($grid->horaries as $horary) {
                    $startTimeExist = Carbon::parse($horary->start_time);
                    $endTimeExist = Carbon::parse($horary->end_time);
                    if ($horary->weekday == $this->input('weekday')) {
                        if ($startTime->between($startTimeExist,$endTimeExist) || $endTime->between($startTimeExist,$endTimeExist)) {
                            $fail('Existe um conflite de horarios nessa grade.');
                        }
                    }
                }
            }],
            'weekday' => 'required|string|in:Domingo,Segunda-Feira,Terça-Feira,Quarta-Feira,Quinta-Feira,Sexta-Feira,Sábado',
            'start_time' => 'required|date_format:H:i',
            'end_time' => ['required','date_format:H:i',
                function ($attribute, $value, $fail) {
                    $startTime = Carbon::parse($this->input('start_time'));
                    $endTime = Carbon::parse($this->input('end_time'));
                    if (!$endTime->gt($startTime)) {
                        $fail('o valor de \'Horário termino\' deve ser maior que Horário de início.');
                    }
                }
            ]
        ];
    }
}
