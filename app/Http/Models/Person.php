<?php


namespace App\Http\Models;


use App\Http\Models\Address\City;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name',
        'lastName',
        'address',
        'fk_city'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
