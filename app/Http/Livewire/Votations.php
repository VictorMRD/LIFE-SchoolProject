<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\votationtable;

class Votations extends Component
{
    public $tvotaciones = [];
    public $votacion;
    public $sacada;
    protected $listeners = ["agergarVotacion","modificarVotacion","sacarDatos","eliminarVotacion"];
    public function render()
    {
        return view('livewire.votations');
    }
    public function mount(){
        $this->tvotaciones = votationtable::getAllVotations();
        $sacada = new votationtable;
    }

    public function agergarVotacion($pregunta, $r1, $r2, $r3){
        $this->votacion = new votationtable;
        $this->votacion->pregunta = $pregunta;
        $this->votacion->respuesta1 = $r1;
        $this->votacion->respuesta2 = $r2;
        $this->votacion->respuesta3 = $r3;
        $this->votacion->r1votos = 0;
        $this->votacion->r2votos = 0;
        $this->votacion->r3votos = 0;
        $this->votacion->save();
    }

    public function modificarVotacion($id,$pregunta, $r1, $r2, $r3){
        $this->votacion = votationtable::getVotacion($id);;
        $this->votacion->pregunta = $pregunta;
        $this->votacion->respuesta1 = $r1;
        $this->votacion->respuesta2 = $r2;
        $this->votacion->respuesta3 = $r3;
        $this->votacion->r1votos = 0;
        $this->votacion->r2votos = 0;
        $this->votacion->r3votos = 0;
        $this->votacion->save();
    }

    public function sacarDatos($id){
        $this->sacada = votationtable::getVotacion($id);
    }
    public function eliminarVotacion($id){
        $this->sacada = votationtable::getVotacion($id);
        $this->sacada->delete();
    }
}
