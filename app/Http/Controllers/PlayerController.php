<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    // Store Player Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'rank' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Player::create($formFields);

        return redirect('/raid-planner')->with('message', 'Player created successfully!');
    }

    // Delete Player
    public function destroy(Player $player_id) {
        $player_id->delete();
        return redirect('/raid-planner')->with('message', 'Player deleted successfully!');
    }
}
