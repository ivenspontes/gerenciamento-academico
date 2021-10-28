<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class GreaterThan implements Rule
{
    private $timeToCheck;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($timeToCheck)
    {
        $this->timeToCheck = $timeToCheck;
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
        $startTime = Carbon::parse($this->timeToCheck);
        $endTime = Carbon::parse($value);

        if (!$endTime->gt($startTime)) {
            return false;
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
        return 'O valor de \'Horário termino\' deve ser maior que Horário de início.';
    }
}
