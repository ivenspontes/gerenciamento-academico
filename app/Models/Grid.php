<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grid extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'classroom_id'
    ];

    /**
     * Get the classroom that owns the Grid
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    /**
     * Get all of the horaries for the Grid
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function horaries(): HasMany
    {
        return $this->hasMany(Horary::class);
    }


    /**
     * Get array of horaries order by and group by weekday
     *
     * @return array $horaries
     */
    public function horariesByWeekday()
    {
        $horaries = $this->horaries->sortBy(['weekday','start_time'])->groupBy('weekday')->toArray();

        if ($horaries) {
            $sunday = $horaries['Domingo'];
            unset($horaries['Domingo']);
            $horaries['Domingo'] = $sunday;
        }
        return $horaries;
    }
}
