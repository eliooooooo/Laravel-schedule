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
        $formation = new Formation();
        $formation->name = $request->input('name');
        $formation->save();
        return redirect()->route('formation.index');
    }

    public function show(Formation $formation) {
        return view('formation.show', ['formation' => $formation]);
    }
}
