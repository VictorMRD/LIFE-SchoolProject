<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserProfile extends Component
{   
    public $user;
    protected $listeners = ['saveChanges'];
    public function render()
    {
        return view('livewire.user-profile');
    }

    public function saveChanges($id,$userN,$userE,$userA,$userD){
        $this->user = $this->getTheUser($id);
        $this->user->name = $userN;
        $this->user->email = $userE;
        $this->user->age = $userA;
        $this->user->description = $userD;
        $this->user->save();

        session(['user' => $userN]);
        session(['email' => $userE]);
        session(['age' => $userA]);
        session(['description' => $userD]);
    }

    public function getTheUser($id){
        $this->user = User::getUser($id);
        return $this->user;
    }
}
