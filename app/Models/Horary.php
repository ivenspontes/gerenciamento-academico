<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Horary extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'teacher_id',
        'discipline_id',
        'grid_id',
        'week_id',
        'start_time',
        'end_time',
    ];

    /**
     * Get the teacher that owns the Horary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Get the disclipline that owns the Horary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }

    /**
     * Get the grid that owns the Horary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grid(): BelongsTo
    {
        return $this->belongsTo(Grid::class);
    }

    /**
     * Get the weekday of the the Horary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function weekday(): BelongsTo
    {
        return $this->belongsTo(Week::class, 'week_id', 'id');
    }

    // /**
    //  * Get the week associated with the Horary
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function weekday(): HasOne
    // {
    //     return $this->hasOne(Week::class, 'id', 'week_id');
    // }
}
