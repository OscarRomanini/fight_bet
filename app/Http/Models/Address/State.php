<?php


namespace App\Http\Models\Address;


use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
      'name',
      'fk_country'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
