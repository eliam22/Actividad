<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperHeroType extends Model
{
    use HasFactory;

    protected $table = 'superhero_types'; // Asegúrate de que coincida con la migración

    protected $fillable = ['name'];
}


