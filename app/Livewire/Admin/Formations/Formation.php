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

    public $editFormation = [];

    public $program = [];
    public $listOfPrograms = [];
    public $editProgram = [];

    public $newTypeFormation = '';

    public $debouche = [];
    public $listOfDebouches = [];
    public $editDebouche = [];

    public $search = '';

    public $pageStatus = 'list';
    
    
    // start create section

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
                'formation.codTypeFormation' => 'required|exists:type_formations,id',
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
            $this->listOfDebouches = [];
            $this->formation = [];
            
            $this->dispatch('formationCreated');        
            
        }

    // end create section
    
// ---------------------------------------------------------------------------------------- //


    // start Edit Section
        

        public function updateFormation(){
            dd($this->editFormation);
        }
        

    // end Edit Section


// ---------------------------------------------------------------------------------------- //
    public function switchToCreate(){
        $this->pageStatus = 'create';
    }
    
    public function switchToEdit($id){
        $this->editFormation = ModelsFormation::find($id)->toArray();
        $this->editProgram = program::select('titre')->where('cod_formation', $id)->get()->toArray();
        foreach($this->editProgram as $program){
            array_push($this->listOfPrograms, $program['titre']);
        }

        $this->editDebouche = debouche::select('titre')->where('cod_formation', $id)->get()->toArray();
        foreach($this->editDebouche as $debouche){
            array_push($this->listOfDebouches, $debouche['titre']);
        }

        $this->editDebouche = [];
        $this->editProgram = [];
        $this->pageStatus = 'edit';
    }
    
    public function switchToList(){
        $this->pageStatus = 'list';
    }

    public function render()
    {
        $typeFormations = \App\Models\typeFormation::all();
        $formations = ModelsFormation::with('typeFormation')->where('nome', 'like', '%'.$this->search.'%')->get();

        return view('livewire.admin.formations.index', [
            'typeFormations' => $typeFormations,
            'formations' => $formations
        ])
                ->extends('livewire.admin.app')
                ->section('content');
    }
}
