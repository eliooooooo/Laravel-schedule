<?php

namespace App\Http\Controllers;

use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::orderBy('name')->get();

        return view('group.index', ['groups' => $groups]);
    }

    public function show($id)
    {
        $group = Group::findOrFail($id);

        return view('group.show', ['group' => $group]);
    }
}
