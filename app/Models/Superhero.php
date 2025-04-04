<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperHero extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'real_name',
        'universe_id',
        'type_id',
        'gender_id',
        'powers',
        'affiliation'
    ];

    /**
     * Get the universe that the superhero belongs to.
     */
    public function universe()
    {
        return $this->belongsTo(Universe::class);
    }

    /**
     * Get the type of the superhero.
     */
    public function type()
    {
        return $this->belongsTo(SuperHeroType::class);
    }

    /**
     * Get the gender of the superhero.
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    protected $table = 'superheroes';

    protected $casts = [
        'powers' => 'array'
    ];
} 