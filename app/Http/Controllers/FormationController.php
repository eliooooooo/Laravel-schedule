<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FormationController extends Controller
{
    public function index() {
        Gate::authorize('viewAny', Formation::class);
        $formations = Formation::orderBy('name')->get();
        return view('formation.index', ['formations' => $formations]);
    }

    public function create(){
        Gate::authorize('create', Formation::class);
        return view('formation.create');
    }

    public function store(Request $request){
        Gate::authorize('create', Formation::class);
        $data = $request->validate(
            ['name' => 'required']
        );

        $formation = new Formation();
        $formation->fill($data);
        $formation->save();
        return redirect()->route('formation.index');
    }

    public function show(Formation $formation) {
        Gate::authorize('view', $formation);
        return view('formation.show', ['formation' => $formation]);
    }

    public function edit(Formation $formation){
        Gate::authorize('update', $formation);
        return view('formation.edit', ['formation' => $formation]);
    }

    public function update(Request $request, Formation $formation){
        Gate::authorize('update', $formation);
        $data = $request->validate(
            ['name' => 'required']
        );

        $formation->fill($data);
        $formation->save();
        return redirect()->route('formation.index');
    }

    public function destroy(Formation $formation){
        Gate::authorize('delete', $formation);
        $formation->delete();
        return redirect()->route('formation.index');
    }

}
