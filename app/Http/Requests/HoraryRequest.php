<?php

namespace App\Http\Requests;

use App\Rules\CheckConflict;
use App\Rules\GreaterThan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => 'required|unique:horaries,name,' . $id . ',id',
            'teacher_id' => 'required|exists:teachers,id',
            'discipline_id' => [
                'required',
                Rule::exists('teacher_discipline', 'discipline_id')
                    ->where('teacher_id', $this->input('teacher_id'))
            ],
            'grid_id' => [
                'required',
                'exists:grids,id'
            ],
            'week_id' => 'required|exists:weeks,id',
            'start_time' => [
                'required',
                new CheckConflict($this->segment(2), $this->input())
            ],
            'end_time' => [
                'required',
                new CheckConflict($this->segment(2), $this->input()),
                new GreaterThan($this->input('start_time'))
            ]
        ];
    }

    public function messages()
    {
        return [
            'discipline_id.exists' => 'Professor não associado a essa disciplina.',
        ];

    }
}
