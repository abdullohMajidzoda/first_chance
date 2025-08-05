<?php

namespace App\Livewire\MainPage;

use Livewire\Component;
use App\Models\Type;

class TypeOfJob extends Component
{
    public function render()
    {
        return view('livewire.main-page.type-of-job', [
            'categories' => Type::all()
        ]);
    }
}
