<?php

namespace App\Livewire;

use App\Models\Boss;
use App\Models\Character;
use App\Models\Player;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Rule;

class RaidPlanner extends Component
{
    public $playerName = '';
    public $rank = '';

    public $player_id = '';
    public $characterName = '';
    public $class = '';
    public $spec = '';

    public function storePlayer() {
        $validated = $this->validate([
            'playerName' => 'required',
            'rank' => 'required',
        ]);

        Player::create([
            'name' => $this->playerName,
            'rank' => $this->rank,
            'user_id' => auth()->id(),
        ]);

        $this->reset('playerName', 'rank');
        session()->flash('success', 'Player created successfully');
    }

    public function storeCharacter() {
        $validated = $this->validate([
            'player_id' => 'required',
            'characterName' => 'required',
            'class' => 'required',
            'spec' => 'required',
        ]);

        Character::create([
            'player_id' => $this->player_id,
            'name' => $this->characterName,
            'class' => $this->class,
            'spec' => $this->spec,
        ]);

        $this->player_id = '';
        $this->characterName = '';
        $this->class = '';
        $this->spec = '';

        $this->reset();
        session()->flash('success', 'Character created successfully');
    }

    public function deletePlayer($playerId)
    {
        $player = Player::find($playerId);
        if (!(auth()->user()->id === $player->user_id)) {
            abort(403);
        }

        $this->delete($player);
    }

    protected function delete($player)
    {
        if ($player) {
            $player->delete();
        }
    }

    public function insertPlayer($bossId, $playerId)
    {
        $player = Player::find($playerId);
        if (!(auth()->user()->id === $player->user_id)) {
            abort(403);
        }

        $this->insert($bossId, $player);
    }

    protected function insert($bossId, $player)
    {
        try {
            $boss = Boss::find($bossId);

            if ($player) {
                $playerCount = $boss->players()->where('user_id', $player->user_id)->count();
                
                if ($playerCount <= 20) {

                    // Insert (Convert Spec from players into Role to boss_player pivot table)
                    if (in_array($player->character_spec, ['Protection', 'Guardian', 'Brewmaster', 'Vengeance', 'Blood'])) {
                        //$boss->players()->attach($player->id, ['role' => 'Tank', 'class' => $player->character_class]);
                        $player->bosses()->attach($bossId, ['role' => 'Tank', 'class' => $player->character_class]);
                    } else if (in_array($player->character_spec, ['Discipline', 'Holy', 'Restoration', 'Mistweaver', 'Preservation'])) {
                        //$boss->players()->attach($player->id, ['role' => 'Healer', 'class' => $player->character_class]);
                        $player->bosses()->attach($bossId, ['role' => 'Healer', 'class' => $player->character_class]);
                    } else if (in_array($player->character_spec, ['Marksmanship', 'Beast Master', 'Arcane', 'Frost', 'Fire', 'Shadow', 'Demonology', 'Affliction', 'Destruction', 'Balance', 'Elemental', 'Devastation', 'Augmentation'])) {
                        //$boss->players()->attach($player->id, ['role' => 'Ranged', 'class' => $player->character_class]);
                        $player->bosses()->attach($bossId, ['role' => 'Ranged', 'class' => $player->character_class]);
                    } else {
                        //$boss->players()->attach($player->id, ['role' => 'Melee', 'class' => $player->character_class]);
                        $player->bosses()->attach($bossId, ['role' => 'Melee', 'class' => $player->character_class]);
                    }
                    
                    // Rank Append
                    if ($player->rank === 'Raider' || $player->rank === 'Trial' || $player->rank === 'Social') {
                        $player->update(['rank' => $player->rank . "InRosterX" . $bossId]);
                    } else
                        $player->update(['rank' => $player->rank . "X" . $bossId]);

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

    public function removePlayer($bossId, $playerId)
    {
        $player = Player::find($playerId);
        if (!(auth()->user()->id === $player->user_id)) {
            abort(403);
        }

        $this->remove($bossId, $player);


        // if ($boss && $player) {


        //      Raider/Trial Check
        //     if (preg_match("/^RaiderInRoster/", $player->rank)) {

        //         $newRank = str_replace("X" . $boss->positionInRaid, '', $player->rank);

        //         if (preg_match("/^RaiderInRoster$/", $newRank)) {
        //             $player->update(['rank' => 'Raider']);
        //             $boss->players()->detach($player->id);
        //         } else
        //             $player->update(['rank' => $newRank]);
        //         $boss->players()->detach($player->id);
        //     } else if (preg_match("/^TrialInRoster/", $player->rank)) {

        //         $newRank = str_replace("X" . $boss->positionInRaid, '', $player->rank);

        //         if (preg_match("/^TrialInRoster$/", $newRank)) {
        //             $player->update(['rank' => 'Trial']);
        //             $boss->players()->detach($player->id);
        //         } else
        //             $player->update(['rank' => $newRank]);
        //         $boss->players()->detach($player->id);
        //     }

        //     session()->flash('success', 'Player ID removed from the boss successfully');
        // } else {
        //     session()->flash('error', 'Boss or player not found');
        // }
    }

    protected function remove($bossId, $player)
    {

        $rankPrefix = ['RaiderInRoster', 'TrialInRoster'];

        foreach ($rankPrefix as $prefix) {
            if (strpos($player->rank, $prefix) === 0) {
                $newRank = str_replace("X" . $bossId, '', $player->rank);

                if ($newRank === $prefix) {
                    $player->update(['rank' => str_replace('InRoster', '', $prefix)]);
                } else {
                    $player->update(['rank' => $newRank]);
                }

                $player->bosses()->detach($bossId);
                session()->flash('success', 'Player ID removed from the boss successfully');
            }
        }
    }

    public function updatePlayer($bossId, $playerId, $characterClass, $characterSpec)
    {
        $player = Player::find($playerId);

        if (!(auth()->user()->id === $player->user_id)) {
            abort(403);
        }

        $this->update($bossId, $player, $characterClass, $characterSpec);



        // if ($player && $boss) {
        //     $player->update(['character_class' => $characterClass]);
        //     $player->update(['character_spec' => $characterSpec]);

        //      Update boss_player pivot table role column (Convert $player->spec to role)
        //     if (in_array($characterSpec, ['Protection', 'Guardian', 'Brewmaster', 'Vengeance', 'Blood'])) {
        //         $boss->players()->updateExistingPivot($playerId, ['role' => 'Tank', 'class' => $player->character_class]);
        //     } else if (in_array($characterSpec, ['Discipline', 'Holy', 'Restoration', 'Mistweaver', 'Preservation'])) {
        //         $boss->players()->updateExistingPivot($playerId, ['role' => 'Healer', 'class' => $player->character_class]);
        //     } else if (in_array($characterSpec, ['Marksmanship', 'Beast Master', 'Arcane', 'Frost', 'Fire', 'Shadow', 'Demonology', 'Affliction', 'Destruction', 'Balance', 'Elemental', 'Devastation', 'Augmentation'])) {
        //         $boss->players()->updateExistingPivot($playerId, ['role' => 'Ranged', 'class' => $player->character_class]);
        //     } else {
        //         $boss->players()->updateExistingPivot($playerId, ['role' => 'Melee', 'class' => $player->character_class]);
        //     }

        //     session()->flash('success', 'Player role changed successfully!');
        // }
    }

    protected function update($bossId, $player, $characterClass, $characterSpec)
    {
        $boss = Boss::find($bossId);

        $roleMappings = [
            'Protection' => 'Tank',
            'Guardian' => 'Tank',
            'Brewmaster' => 'Tank',
            'Blood' => 'Tank',
            'Vengeance' => 'Tank',

            'Restoration' => 'Healer',
            'Holy' => 'Healer',
            'Discipline' => 'Healer',
            'Mistweaver' => 'Healer',
            'Preservation' => 'Healer',

            'Marksmanship' => 'Ranged',
            'Beast Master' => 'Ranged',
            'Arcane' => 'Ranged',
            'Frost' => 'Ranged',
            'Fire' => 'Ranged',
            'Shadow' => 'Ranged',
            'Demonology' => 'Ranged',
            'Affliction' => 'Ranged',
            'Destruction' => 'Ranged',
            'Balance' => 'Ranged',
            'Elemental' => 'Ranged',
            'Devastation' => 'Ranged',
            'Augmentation' => 'Ranged',
        ];

        $defaultRole = 'Melee';

        $role = $roleMappings[$characterSpec] ?? $defaultRole;

        if ($player && $boss) {

            $player->update(['character_class' => $characterClass]);
            $player->update(['character_spec' => $characterSpec]);

            $boss->players()->updateExistingPivot($player->id, ['role' => $role, 'class' => $player->character_class]);
            session()->flash('success', 'Player role changed successfully!');
        }
    }

    public function render()
    {
        $user = auth()->user();

        if ($user) {
            $bossesQuery =  cache()->remember('bosses_query', now()->addHours(1), function () {
                return Boss::all();
            });

            $playersQuery = Player::with('characters')->where('user_id', $user->id)->get();
            // $playersQuery = cache()->remember('players_query', now()->addHours(1), function () {
            //     return Player::with('characters')->where('user_id', auth()->user()->id)->get();
            // });
        }

        return view('livewire.raid-planner', [
            'bossesQuery' => $bossesQuery,
            'playersQuery' => $playersQuery,
        ]);
    }
}
