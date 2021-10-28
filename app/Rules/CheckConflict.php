<?php

namespace App\Rules;

use App\Models\Grid;
use App\Models\Horary;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class CheckConflict implements Rule
{

    private $horaryId;
    private $input;
    private $horaryConflict;

    /**
    * Create a new rule instance.
    *
    * @return void
    */
    public function __construct($horaryId = null, $input)
    {
        $this->horaryId = $horaryId;
        $this->input = $input;
    }

    /**
    * Determine if the validation rule passes.
    *
    * @param  string  $attribute
    * @param  mixed  $value
    * @return bool
    */
    public function passes($attribute, $value)
    {
        $time = Carbon::parse($value);

        $startTime = Carbon::parse($this->input['start_time']);
        $endTime = Carbon::parse($this->input['end_time']);

        if ($this->horaryId && Horary::find($this->horaryId)->grid->id == $this->input['grid_id']) {
            $horaries = Horary::where('grid_id', $this->input['grid_id'])->whereNotIn('id', [$this->horaryId])->get();
        } else {
            $grid = Grid::find($this->input['grid_id']);
            $horaries = $grid->horaries;
        }

        foreach ($horaries as $horary) {
            $startTimeHorary = Carbon::parse($horary->start_time);
            $endTimeHorary = Carbon::parse($horary->end_time);
            if ($horary->weekday == $this->input['weekday']) {

                if($startTime->equalTo($startTimeHorary) && $endTime->equalTo($endTimeHorary)) {
                    $this->horaryConflict = $horary;
                    return false;
                }

                if ($time->gt($startTimeHorary) && $time->lt($endTimeHorary)) {
                    $this->horaryConflict = $horary;
                    return false;
                }
            }
        }

        return true;
    }

    /**
    * Get the validation error message.
    *
    * @return string
    */
    public function message()
    {
        return 'Existe um conflito de horários nessa grade. ' .
        'Horário em conflito: ' . $this->horaryConflict->start_time. ' - '
        . $this->horaryConflict->end_time;
    }
}
