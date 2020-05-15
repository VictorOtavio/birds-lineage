<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'male_id',
        'female_id',
        'cage_id',
    ];

    /**
     * Get the male bird of this pair.
     */
    public function male()
    {
        return $this->belongsTo(Bird::class, 'male_id');
    }

    /**
     * Get the female bird of this pair.
     */
    public function female()
    {
        return $this->belongsTo(Bird::class, 'female_id');
    }

    /**
     * Get the cage of this pair.
     */
    public function cage()
    {
        return $this->belongsTo(Cage::class);
    }
}
