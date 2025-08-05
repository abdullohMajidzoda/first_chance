<?php

namespace App\Livewire\AnotherPages;

use Livewire\Component;
use App\Models\Type;
use App\Livewire\Forms\JobForm;

class JobCreate extends Component
{
    public JobForm $form;

    public function save(){
        $this->form->saveJob();
        $this->redirectRoute('home', navigate: true);
    }

    public function render()
    {
        return view('livewire.another-pages.job-create',[
            'types' => Type::all()
        ]);
    }
}
