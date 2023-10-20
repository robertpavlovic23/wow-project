<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Player;
use Livewire\Attributes\Rule;

class PlayerAddForm extends Form
{
    #[Rule('required')]
    public $playerName = '';

    #[Rule('required')]
    public $rank = 'Raider';

    public function storePlayer() {
        Player::create([
            'name' => $this->playerName,
            'rank' => $this->rank,
            'user_id' => auth()->id(),
        ]);

        $this->reset('playerName');
        session()->flash('success', 'Player created successfully');
    }
}
