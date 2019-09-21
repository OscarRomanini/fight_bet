<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\Fighter;
use Illuminate\Support\Facades\DB;

class FighterService
{
    public function getAll()
    {
        return Fighter::query()->orderBy('name')->get();
    }

    public function create($request)
    {
        DB::transaction(function () use ($request) {
            return Category::create($request->all());
        });
    }

    public function update($fighter, $request)
    {
        DB::transaction(function () use ($fighter, $request) {
            $fighter->name = $request->input('name');
            $fighter->lastname = $request->input('lastname');
            $fighter->alias = $request->input('alias');
            $fighter->height = $request->input('height');
            $fighter->weight = $request->input('weight');
            $fighter->city = $request->input('city');
            $fighter->city = $request->input('state');
            $fighter->city = $request->input('country');

            return $fighter->save();
        });
    }

    public function destroy($fighter)
    {
        DB::transaction(function () use ($fighter) {
            return Fighter::destroy($fighter);
        });
    }

}
