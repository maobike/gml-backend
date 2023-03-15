<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Obtener los usuarios de la categoría.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}
