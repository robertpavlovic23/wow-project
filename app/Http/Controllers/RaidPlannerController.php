<?php

namespace App\Http\Controllers;

use App\Models\Boss;
use App\Models\Character;
use App\Models\Player;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RaidPlannerController extends Controller
{
    public function show() {
        $user = auth()->user();

        if ($user) {
            // $bossesQuery = Boss::with(['players' => function ($query) use ($user) {
            //     $query->where('user_id', $user->id);
            // }, 'players.characters'])->get();
            //$bossesQuery = Boss::all();
            $playersQuery = Player::with('characters')->where('user_id', $user->id)->get();
        } else {
            //$bossesQuery = [];
            $playersQuery = [];
        }

        return view('/raid-planner/show', [
            //'bossesQuery' => $bossesQuery,
            'playersQuery' => $playersQuery,
        ]);
    }

    public function insert($bossId, $playerId) {
        try {
            $boss = Boss::find($bossId);
            $player = Player::find($playerId);

            if ($boss && $player) {
                $playerCount = $boss->players()->count();

                if ($playerCount <= 20) {
                    $boss->players()->attach($player->id);

                    return redirect()->back()->with('success', 'Player ID inserted into the pivot table successfully');
                }
                return redirect()->back()->with('error', 'Player limit reached for this boss');
            } else {
                return redirect()->back()->with('error', 'Boss or player not found');
            }
        } catch (QueryException $ex) {
            return redirect()->back()->with('error', 'Duplicate entry. The player is already associated with this boss.');
        }
    }
}
