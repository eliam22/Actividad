<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universo extends Model
{
    use HasFactory;

    protected $table = 'universos';  // Asegúrate de que coincida con el nombre de la tabla

    protected $fillable = ['name', 'description'];

    // Relación con Superhero
    public function superheroes()
    {
        return $this->hasMany(Superhero::class);
    }
}





