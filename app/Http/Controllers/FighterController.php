<?php

namespace App\Http\Controllers;

use App\Http\Services\FighterService;
use App\Models\Fighter;
use Illuminate\Http\Request;

class FighterController extends Controller
{
    public function index(FighterService $fighterService)
    {
        $fighters = $fighterService->getAll();
        return view('fighter.index', compact('fighters'));
    }

    public function create(Request $request, FighterService $fighterService)
    {
        $fighterService->create($request);
        $request->session()->flash('message', 'Cadastrado com sucesso!');
        return redirect()->route('fighters_list');
    }

    public function edit(Request $request, FighterService $fighterService)
    {
        $fighter = Fighter::find($request->id);
        $fighterService->update($fighter, $request);
    }

    public function drop(Request $request, FighterService $fighterService)
    {
        $fighter = Fighter::find($request->id);
        $fighterService->destroy($fighter);
    }
}
