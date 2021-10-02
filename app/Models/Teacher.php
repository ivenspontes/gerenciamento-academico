<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'cpf',
        'birth_date',
    ];

    /**
     * The disciplines that belong to the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function disciplines(): BelongsToMany
    {
        return $this->belongsToMany(Discipline::class, 'teacher_discipline');
    }
}
