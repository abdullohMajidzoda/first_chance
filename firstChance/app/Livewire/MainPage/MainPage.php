<?php

namespace App\Livewire\MainPage;

use Livewire\Component;
use App\Models\Position;
use App\Models\Type;
use Livewire\WithPagination;

class MainPage extends Component
{
    use WithPagination;
    public string $search = '';

    public $types;
    public $selectedType = '';

    public function mount()
    {
        $this->types = Type::all();
    }

    public function render()
    {
        $positions = Position::with('type')
            ->when($this->selectedType, function ($query) {
                $query->where('type_id', $this->selectedType);
            })
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('location', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('livewire.main-page.main-page', [
            'positions' => $positions,
            'types' => $this->types,
        ]);
    }
}
