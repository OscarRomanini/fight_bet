<?php


namespace App\Http\Models\Address;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
      'name',
      'fk_state'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
