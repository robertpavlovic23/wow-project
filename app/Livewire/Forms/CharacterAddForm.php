<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Character;
use App\Models\Player;
use Livewire\Attributes\Rule;

class CharacterAddForm extends Form
{
    #[Rule('required')]
    public $characterName = '';

    public $playerId;
    public $class;
    public $spec;

    public function storeCharacter() {  
        if(!$this->playerId || $this->playerId == 'Select player') {
            $player = Player::where('user_id', auth()->user()->id)->first();
            if($player) {
                $this->playerId = $player->id;
            }
        }

        Character::create([
            'player_id' => $this->playerId,
            'name' => $this->characterName,
            'class' => $this->class,
            'spec' => $this->spec,
        ]);

        $this->reset('characterName');
        session()->flash('success', 'Character created successfully');
    }
}
