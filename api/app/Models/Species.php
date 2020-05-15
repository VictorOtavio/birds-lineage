<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'popular_name',
        'latin_name',
        'price',
        'incubation',
        'check_fertilized',
        'leg_banding',
        'nest_exit',
        'weaned',
        'sexual_maturity',
        'egg_laying',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'price'            => 'float',
        'incubation'       => 'integer',
        'check_fertilized' => 'integer',
        'leg_banding'      => 'integer',
        'nest_exit'        => 'integer',
        'weaned'           => 'integer',
        'sexual_maturity'  => 'integer',
        'egg_laying'       => 'integer',
    ];

    /**
     * Get the bird of this species.
     */
    public function birds()
    {
        return $this->hasMany(Bird::class);
    }
}
