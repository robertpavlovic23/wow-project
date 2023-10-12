<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Player;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    // Store Character Data
    public function store(Request $request) {
        $formFields = $request->validate([

            'player_id' => 'required',
            'character_name' => 'required',
            'class' => 'required',
            'role' => 'required',
        ]);

        $character = Character::create($formFields);

        $player = Player::find($formFields['player_id']);

        if($player && $player->character_role === null) {
            $player->update(['character_role' => $character->role]);
        }

        return redirect('/raid-planner')->with('message', 'Character created successfully!');
    }

    // Delete Character
    public function destroy(Character $character_id) {
        $character_id->delete();
        return redirect('/raid-planner')->with('message', 'Character deleted successfully!');
    }
}
