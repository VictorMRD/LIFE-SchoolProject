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
    protected $listeners = ["eliminarUsuario","agregarBuenUsuario","removerBuenUsuario",
    "guardarUsuarioEliminado","agregarAdministrador","retirarAdministrador",
    "modificarMensaje","banearUsuario","removerBaneo"];

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

    public function removerBaneo($id){
        $usuario = User::getUser($id);
        $usuario->banned = "no";
        $usuario->save();
        return redirect()->to('/administrator');
    }

    public function banearUsuario($id){
        $usuario = User::getUser($id);
        $usuario->banned = "yes";
        $usuario->save();
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
    public function retirarAdministrador($email){
        $usert = User::getUserE($email);
        $usert->role = "user";
        $usert->save();
        Session::flash('message', 'Administrador retirado');
        return redirect()->to('/administrator');
    }

    public function agregarAdministrador($email){
        $usert = User::getUserE($email);
        $usert->role = "admin";
        $usert->save();
        Session::flash('message', 'Administrador agregado');
        return redirect()->to('/administrator');
    }

    public function modificarMensaje($email,$mensaje){
        $usert = User::getUserE($email);
        $usert->alert = $mensaje;
        $usert->save();
        Session::flash('message', 'Mensaje enviado');
        return redirect()->to('/administrator');
    }
}
