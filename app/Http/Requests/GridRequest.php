<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GridRequest extends FormRequest
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
            'name' => 'required|unique:grids,name,' . $id . ',id',
            'classroom_id' => 'required|exists:classrooms,id',
        ];
    }
}
