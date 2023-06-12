<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\frasesz;

class Mostrarfrases extends Component
{
    public $todaslasfrases = [];
    public function render()
    {
        return view('livewire.mostrarfrases');
    }
    public function mount(){
        $this->todaslasfrases = frasesz::getAllFrases();
    }
}
