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
        'gender',
        'name',
        'father_id',
        'mother_id',
        'birth',
        'end',
        'end_desc',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'father_id' => 'integer',
        'mother_id' => 'integer',
        'birth'     => 'date',
        'end'       => 'date',
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
}
