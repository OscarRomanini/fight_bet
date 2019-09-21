<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'min_weight', 'max_weight'];

    public function fighters()
    {
        return $this->hasMany(Fighter::class);
    }
}
