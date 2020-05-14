<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
    ];

    /**
     * Get the birds of this cage.
     */
    public function birds()
    {
        return $this->hasMany(Bird::class);
    }
}
