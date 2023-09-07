<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    // Store Character Data
    public function store(Request $request) {
        $formFields = $request->validate([

            'character_name' => 'required',
            'class' => 'required',
            'spec' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Character::create($formFields);

        return redirect('/raid-planner')->with('message', 'Character created successfully!');
    }

    public function destroy(Character $character_id) {
        $character_id->delete();
        return redirect('/raid-planner')->with('message', 'Character deleted successfully!');
    }
}
