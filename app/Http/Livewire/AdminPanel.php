<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\BestUsers;
use App\Models\DeletedUsers;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class AdminPanel extends Component
{
    public $users = [];
    public $bestUsers = [];
    public $dollUser;
    public $deletedUsers = [];
    protected $listeners = ["eliminarUsuario","agregarBuenUsuario","removerBuenUsuario","guardarUsuarioEliminado"];

    public function render()
    {
        return view('livewire.admin-panel');
    }

    public function mount(){
        $this->users = User::getAllUsers();
        $this->bestUsers = BestUsers::getAllUsers();
        $this->deletedUsers = DeletedUsers::getAllDeleted();
    }

    public function eliminarUsuario($email,$name){
        BestUsers::removeUser($email);
        $this->guardarUsuarioEliminado($email,$name);
        User::removeUserr($email);
        return redirect()->to('/administrator');
    }

    public function guardarUsuarioEliminado($email, $name){
        DeletedUsers::addDeleted($email,$name);
        return redirect()->to('/administrator');
    }

    public function agregarBuenUsuario($nombre, $email){
        $this->dollUser = BestUsers::findUser($email);

        if($this->dollUser == null){
            BestUsers::addUser($nombre, $email);
            return redirect()->to('/administrator');
        }else
            Session::flash('message', 'User already exists!');
    }
    
    public function removerBuenUsuario($email){
        BestUsers::removeUser($email);
        return redirect()->to('/administrator');
    }
}
