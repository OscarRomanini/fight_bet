<?php


namespace App\Models;


use App\Http\Models\Person;
use Illuminate\Database\Eloquent\Model;

class Fighter extends Person
{
    protected $fillable = [
        'name',
        'lastName',
        'address',
        'fk_city',
        'alias',
        'height',
        'weight',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryById($id)
    {
        return Category::find($id)->name;
    }
}
