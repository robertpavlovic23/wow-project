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
                $playerCount = $boss->players()->where('user_id', $player->user_id)->count();

                if ($playerCount <= 20) {
                    $boss->players()->attach($player->id, ['role' => $player->character_role]);

                    // Rank Append
                    if($player->rank === 'Raider' || $player->rank === 'Trial' || $player->rank === 'Social') {
                        $player->update(['rank' =>$player->rank . "InRosterX" . $boss->positionInRaid]);
                    } else 
                        $player->update(['rank' =>$player->rank . "X" . $boss->positionInRaid]);
                    
                    session()->flash('success', 'Player ID inserted into the pivot table successfully!');
                } else {
                    session()->flash('error', 'Player limit reached for this boss');
                }
            } else {
                session()->flash('error', 'Boss or player not found');
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Duplicate entry. The player is already associated with this boss.');
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

            // Raider Check
            if (preg_match("/^RaiderInRoster/", $player->rank)) {
                
                $newRank = str_replace("X" . $boss->positionInRaid, '', $player->rank);

                if(preg_match("/^RaiderInRoster$/", $newRank)) {
                    $player->update(['rank' => 'Raider']);
                } else 
                    $player->update(['rank' => $newRank]);
            }

            // Trial Check
            if (preg_match("/^TrialInRoster/", $player->rank)) {
                
                $newRank = str_replace("X" . $boss->positionInRaid, '', $player->rank);

                if(preg_match("/^TrialInRoster$/", $newRank)) {
                    $player->update(['rank' => 'Trial']);
                } else 
                    $player->update(['rank' => $newRank]);
            }
             

            session()->flash('success', 'Player ID removed from the boss successfully');
        } else {
            session()->flash('error', 'Boss or player not found');
        }
    }

    public function updatePlayer($bossId, $playerId, $characterRole)
    {
        $boss = Boss::find($bossId);
        $player = Player::find($playerId);

        if ($player && $boss) {
            $player->update(['character_role' => $characterRole]);
            $boss->players()->updateExistingPivot($playerId, ['role' => $characterRole]);
            session()->flash('success', 'Player role changed successfully!');
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