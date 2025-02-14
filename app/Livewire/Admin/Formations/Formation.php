<?php

namespace App\Livewire\Admin\Formations;

use App\Models\debouche;
use App\Models\formation as ModelsFormation;
use App\Models\program;
use App\Models\typeFormation;
use Livewire\Component;

class Formation extends Component
{

    public $formation = [];

    public $program = [];
    public $listOfPrograms = [];

    public $newTypeFormation = '';

    public $debouche = [];
    public $listOfDebouches = [];
    
    
    
    public function addProgramToList(){
        $this->validate([
            'program.titre' => 'string|nullable'
        ]);

        array_push($this->listOfPrograms, $this->program['titre']);
        
        $this->program = [];
    }

    public function deleteProgram($index){
        foreach($this->listOfPrograms as $key => $program){
            if($key == $index){
                unset($this->listOfPrograms[$key]);
            }
        }
    }

    public function addTypeFormation(){
        $this->validate([
            'newTypeFormation' => 'required|string'
        ]);
        
        typeFormation::create([
            'name' => $this->newTypeFormation
        ]);

        $this->newTypeFormation = '';
    }

    public function addDeboucheToList(){
    
        $this->validate([
            'debouche.titre' => 'required|string',
        ]);

        array_push($this->listOfDebouches, $this->debouche['titre']);

        $this->debouche = [];
    }

     public function deleteDebouche($index){
        foreach($this->listOfDebouches as $key => $program){
            if($key == $index){
                unset($this->listOfDebouches[$key]);
            }
        }
    }

    public function newFormation(){
        
        $validateFormation = $this->validate([
            'formation.nome' => 'required',
            'formation.duree' => 'required|numeric',
            'formation.tarif' => 'required|numeric',
            'formation.typeFormation' => 'required|exists:type_formations,id',
        ]);

        $newFormation = ModelsFormation::create($validateFormation['formation']);
        
        foreach($this->listOfPrograms as $program){
            program::create([
                'titre' => $program,
                'cod_formation' => $newFormation->id
            ]);
        }

        foreach($this->listOfDebouches as $debouche){
            debouche::create([
                'titre' => $debouche,
                'cod_formation' => $newFormation->id
            ]);
        }

        $this->listOfPrograms = [];
        $this->formation = [];
        
        $this->dispatch('formationCreated');        
        
    }

    


    

    public function render()
    {
        $typeFormations = \App\Models\typeFormation::all();

        return view('livewire.admin.formations.index', [
            'typeFormations' => $typeFormations,
        ])
                ->extends('livewire.admin.app')
                ->section('content');
    }
}
