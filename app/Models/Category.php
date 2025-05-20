<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function movie(): HasMany
    {
        return $this->hasMany(movie::class);
    }
}
