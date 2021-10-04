<?php

namespace App\Http\Requests;

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
        return [
            'teacher_id' => 'required|exists:teachers,id',
            'discipline_id' => 'required|exists:disciplines,id',
            'grid_id' => 'required|exists:grids,id',
            'weekday' => 'required|string|in:Domingo,Segunda-Feira,Terça-Feira,Quarta-Feira,Quinta-Feira,Sexta-Feira,Sábado',
            'start_time' => 'required|date_format:H:i',
            'end_time' => ['required','date_format:H:i',
                function ($attribute, $value, $fail) {
                    $startTime = Carbon::parse($this->input('start_time'));
                    $endTime = Carbon::parse($this->input('end_time'));
                    if (!$endTime->gt($startTime)) {
                        $fail('o valor de '.$attribute.' deve ser maior que Horário de início.');
                    }
                }
            ]
        ];
    }
}
