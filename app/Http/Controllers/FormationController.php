<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index() {
        $formations = Formation::orderBy('name')->get();
        return view('formation.index', ['formations' => $formations]);
    }

    public function create(){
        return view('formation.create');
    }

    public function store(Request $request){
        $data = $request->validate(
            ['name' => 'required']
        );

        $formation = new Formation();
        $formation->fill($data);
        $formation->save();
        return redirect()->route('formation.index');
    }

    public function show(Formation $formation) {
        return view('formation.show', ['formation' => $formation]);
    }

    public function edit(Formation $formation){
        return view('formation.edit', ['formation' => $formation]);
    }

    public function update(Request $request, Formation $formation){
        $data = $request->validate(
            ['name' => 'required']
        );

        $formation->fill($data);
        $formation->save();
        return redirect()->route('formation.index');
    }

    public function destroy(Formation $formation){
        $formation->delete();
        return redirect()->route('formation.index');
    }

}
