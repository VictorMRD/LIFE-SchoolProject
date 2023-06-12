<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Social extends Component
{
    public $users = [];
    public function render()
    {
        return view('livewire.social');
    }
    
    public function mount(){
        $this->users = User::getAllUsers();
    }
}
