<?php

namespace App\Livewire\Admin;

use App\Models\debouche as ModelsDebouche;
use App\Models\formation;
use Livewire\Component;
use Livewire\WithPagination;

class Debouche extends Component
{
    use WithPagination ;

    public $paginationTheme = 'bootstrap';

    public $edited = [];

    public $perFormation = '';
    public $search = '';


    public function editDebou($id){
        $debouche =$this->edited = ModelsDebouche::find($id)->toArray();
        $this->dispatch('openModal');
    }


    public function addDebouche(){
        $this->validate([
            'edited.titre' => 'required',
            'edited.description' => 'nullable|max:255'
        ]);

        ModelsDebouche::find($this->edited['id'])->update($this->edited);
        $this->dispatch('test');
    }

    public function render()
    {
        $formation = formation::all();
        $data = ModelsDebouche::with('formation')
            ->where('formation_id','like','%'.$this->perFormation.'%')
            ->orWhere('titre','=','%'.$this->search.'%')
            ->paginate(10);

        return view('livewire.admin.debouche.index',[
            'debouches' => $data,
            'formations' => $formation
        ])
                ->extends('livewire.admin.app')
                ->section('content');
    }
}
