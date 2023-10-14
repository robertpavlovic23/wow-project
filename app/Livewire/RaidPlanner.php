<?php

namespace App\Livewire;

use App\Models\Boss;
use App\Models\Character;
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

                    // Insert (Convert Spec from players into Role to boss_player pivot table)
                    if (in_array($player->character_spec, ['Protection', 'Guardian', 'Brewmaster', 'Vengeance', 'Blood'])) {
                        $boss->players()->attach($player->id, ['role' => 'Tank', 'class' => $player->character_class]);
                    } else if (in_array($player->character_spec, ['Discipline', 'Holy', 'Restoration', 'Mistweaver', 'Preservation'])) {
                        $boss->players()->attach($player->id, ['role' => 'Healer', 'class' => $player->character_class]);
                    } else if (in_array($player->character_spec, ['Marksmanship', 'Beast Master', 'Arcane', 'Frost', 'Fire', 'Shadow', 'Demonology', 'Affliction', 'Destruction', 'Balance', 'Elemental', 'Devastation', 'Augmentation'])) {
                        $boss->players()->attach($player->id, ['role' => 'Ranged', 'class' => $player->character_class]);
                    } else {
                        $boss->players()->attach($player->id, ['role' => 'Melee', 'class' => $player->character_class]);
                    }                

                    // Rank Append
                    if ($player->rank === 'Raider' || $player->rank === 'Trial' || $player->rank === 'Social') {
                        $player->update(['rank' => $player->rank . "InRosterX" . $boss->positionInRaid]);
                    } else
                        $player->update(['rank' => $player->rank . "X" . $boss->positionInRaid]);

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
            

            // Raider/Trial Check
            if (preg_match("/^RaiderInRoster/", $player->rank)) {
                
                $newRank = str_replace("X" . $boss->positionInRaid, '', $player->rank);

                if (preg_match("/^RaiderInRoster$/", $newRank)) {
                    $player->update(['rank' => 'Raider']);
                    $boss->players()->detach($player->id);
                } else
                    $player->update(['rank' => $newRank]);
                    $boss->players()->detach($player->id);
            } else if (preg_match("/^TrialInRoster/", $player->rank)) {

                $newRank = str_replace("X" . $boss->positionInRaid, '', $player->rank);

                if (preg_match("/^TrialInRoster$/", $newRank)) {
                    $player->update(['rank' => 'Trial']);
                    $boss->players()->detach($player->id);
                } else
                    $player->update(['rank' => $newRank]);
                    $boss->players()->detach($player->id);
            }

            session()->flash('success', 'Player ID removed from the boss successfully');
        } else {
            session()->flash('error', 'Boss or player not found');
        }
    }

    public function updatePlayer($bossId, $playerId, $character)
    {
        $boss = Boss::find($bossId);
        $player = Player::find($playerId);

        if ($player && $boss) {
            $player->update(['character_class' => $character['class']]);
            $player->update(['character_spec' => $character['spec']]);

            // Update boss_player pivot table role column (Convert $player->spec to role)
            if (in_array($character['spec'], ['Protection', 'Guardian', 'Brewmaster', 'Vengeance', 'Blood'])) {
                $boss->players()->updateExistingPivot($playerId, ['role' => 'Tank', 'class' => $player->character_class]);
            } else if (in_array($character['spec'], ['Discipline', 'Holy', 'Restoration', 'Mistweaver', 'Preservation'])) {
                $boss->players()->updateExistingPivot($playerId, ['role' => 'Healer', 'class' => $player->character_class]);
            } else if (in_array($character['spec'], ['Marksmanship', 'Beast Master', 'Arcane', 'Frost', 'Fire', 'Shadow', 'Demonology', 'Affliction', 'Destruction', 'Balance', 'Elemental', 'Devastation', 'Augmentation'])) {
                $boss->players()->updateExistingPivot($playerId, ['role' => 'Ranged', 'class' => $player->character_class]);
            } else {
                $boss->players()->updateExistingPivot($playerId, ['role' => 'Melee', 'class' => $player->character_class]);
            }

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
