<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bird extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identifier',
        'band',
        'gender',
        'hatch_date',
        'end_date',
        'status',
        'sub_status',
        'species',
        'father_id',
        'mother_id',
        'origin',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'father_id'  => 'integer',
        'mother_id'  => 'integer',
        'hatch_date' => 'date',
        'end_date'   => 'date',
    ];

    /**
     * Get the father bird of this bird.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function father()
    {
        return $this->belongsTo(Bird::class, 'father_id');
    }

    /**
     * Get the mother bird of this bird.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mother()
    {
        return $this->belongsTo(Bird::class, 'mother_id');
    }
}
