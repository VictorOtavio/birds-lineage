<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bird extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identifier',
        'status',
        'sub_status',
        'species_id',
        'sex',
        'origin',
        'band',
        'hatch_date',
        'cage_id',
        'father_id',
        'mother_id',
        'end_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'species_id' => 'integer',
        'cage_id'    => 'integer',
        'father_id'  => 'integer',
        'mother_id'  => 'integer',
        'hatch_date' => 'date',
        'end_date'   => 'date',
    ];

    /**
     * Get the father bird of this bird.
     */
    public function father()
    {
        return $this->belongsTo(Bird::class, 'father_id');
    }

    /**
     * Get the mother bird of this bird.
     */
    public function mother()
    {
        return $this->belongsTo(Bird::class, 'mother_id');
    }

    /**
     * Get the species of this bird.
     */
    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    /**
     * Get the cage of this bird.
     */
    public function cage()
    {
        return $this->belongsTo(Cage::class);
    }
}
