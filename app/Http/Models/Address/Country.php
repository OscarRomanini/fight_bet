<?php


namespace App\Http\Models\Address;


use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
