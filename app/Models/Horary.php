<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'weekday',
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
}
