<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Character;
use Illuminate\Http\Request;

class RaidPlannerController extends Controller
{
    public function show() {
        //$user = User::find(auth()->user()->id);
        $user = auth()->user();
        
        if($user) {
            $characters = Character::where('user_id', $user->id)->get();
        } else {
            $characters = [];
        }

        return view('/raid-planner/show', ['characters' => $characters]);
    }

    
}
