<?php


namespace App\Http\Services;


use App\Http\Models\Address\City;
use App\Http\Models\Address\Country;
use App\Http\Models\Address\State;
use App\Http\Models\Person;
use Illuminate\Support\Facades\DB;

class AddressService
{
    public function getByPersonId($id)
    {
        $person = Person::find($id);
        return $person->city();
    }

    public function getCountries()
    {
        return Country::query()->orderBy('name');
    }

    public function getStates()
    {
        return State::query()->orderBy('name');
    }

    public function getCities()
    {
        return City::query()->orderBy('name');
    }

    public function createCity($request)
    {
        DB::transaction(function () use ($request){
           Country::create($request->country);
           State::create($request->state);
           City::create($request->city);
           return true;
        });
    }

    public function destroyCity()
    {

    }

}
