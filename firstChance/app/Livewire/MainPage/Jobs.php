<?php

namespace App\Livewire\MainPage;

use Livewire\Component;
use App\Models\Position;
use App\Models\Type;
use Livewire\WithPagination;

class Jobs extends Component
{
    use WithPagination;
    public string $search = '';
    
    public function render()
    {
        return view('livewire.main-page.jobs', [
            'positions' => Position::with('type')
            ->when($this->search, function($query){
                $query->whereLike('title', '%' . $this->search . '%')
                ->orWhereLike('location', '%' . $this->search . '%');
            })->paginate(5)
        ],[
            'categories' => Type::with('positions')->get()
        ]);
    }
}
