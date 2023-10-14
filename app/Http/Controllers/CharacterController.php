<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Player;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    // Store Character Data
    public function store(Request $request)
    {
        $formFields = $request->validate([

            'player_id' => 'required',
            'name' => 'required',
            'class' => 'required',
            'spec' => 'required',
        ]);

        $character = Character::create($formFields);

        $player = Player::find($formFields['player_id']);

        if ($player && $player->character_spec === null) {
            $player->update([
                'character_class' => $character->class,
                'character_spec' => $character->spec
            ]);
        }

        return redirect('/raid-planner')->with('message', 'Character created successfully!');
    }

    // Delete Character
    public function destroy(Character $character_id)
    {
        $character_id->delete();
        return redirect('/raid-planner')->with('message', 'Character deleted successfully!');
    }
}
