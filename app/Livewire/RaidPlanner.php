<?php

namespace App\Livewire;

use App\Models\Boss;
use App\Models\Player;
use Livewire\Component;

class RaidPlanner extends Component
{
    public function insertPlayer($bossId, $playerId)
    {
        try {
            $boss = Boss::find($bossId);
            $player = Player::find($playerId);

            if ($boss && $player) {
                $playerCount = $boss->players()->count();

                if ($playerCount <= 20) {
                    $boss->players()->attach($player->id);

                    //return redirect()->back()->with('success', 'Player ID inserted into the pivot table successfully');

                    //return view('livewire.raid-planner-management')->with('success', 'Player ID inserted into the pivot table successfully');
                    session()->flash('success', 'Player ID inserted into the pivot table successfully!');
                } else {
                    return redirect()->back()->with('error', 'Player limit reached for this boss');
                }
            } else {
                return redirect()->back()->with('error', 'Boss or player not found');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Duplicate entry. The player is already associated with this boss.');
        }
    }

    public function deletePlayer($playerId)
    {
        $player = Player::find($playerId);

        if ($player) {
            $player->delete();
        }
    }

    public function removePlayer($bossId, $playerId)
    {
        $boss = Boss::find($bossId);
        $player = Player::find($playerId);

        if ($boss && $player) {
            $boss->players()->detach($player->id);

            return redirect()->back()->with('success', 'Player ID removed from the boss successfully');
        } else {
            return redirect()->back()->with('error', 'Boss or player not found');
        }
    }

    public function updatePlayer($playerId, $characterRole)
    {
        $player = Player::find($playerId);

        if ($player) {
            $player->update(['character_role' => $characterRole]);

            //return redirect()->back()->with('success', 'Player role changed successfully!');
        }
    }

    public function render()
    {
        $user = auth()->user();

        if ($user) {
            // $bossesQuery = Boss::with(['players' => function ($query) use ($user) {
            //     $query->where('user_id', $user->id);
            // }, 'players.characters'])->get();
            $bossesQuery = Boss::all();
            $playersQuery = Player::with('characters')->where('user_id', $user->id)->get();
        } else {
            $bossesQuery = [];
            $playersQuery = [];
        }

        return view('livewire.raid-planner', [
            'bossesQuery' => $bossesQuery,
            'playersQuery' => $playersQuery,
        ]);
    }
}
