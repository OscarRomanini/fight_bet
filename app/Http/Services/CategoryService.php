<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\Fighter;
use Illuminate\Support\Facades\DB;
use function foo\func;

class CategoryService
{
    public function getAll()
    {
        return Category::query()->orderBy('name')->get();
    }

    public function create($request)
    {
        DB::transaction(function () use ($request) {
            return Category::create($request->all());
        });
    }

    public function update($category, $request)
    {
        DB::transaction(function () use ($category, $request) {
            $category->name = $request->input('name');
            $category->min_weight = $request->input('min_weight');
            $category->max_weight = $request->input('max_weight');
            return $category->save();
        });
    }

    public function destroy($request)
    {
        DB::transaction( function () use ($request) {
            $category = Category::find($request->id);
            $category->fighters->each(function (Fighter $fighter){
                $fighter->delete();
            });
            return Category::destroy($category->id);
        });
    }

}
