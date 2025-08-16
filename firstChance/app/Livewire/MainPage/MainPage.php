<?php

namespace App\Livewire\MainPage;

use Livewire\Component;
use App\Models\Position;
use App\Models\Type;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\FavoriteJob;

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

    /* Add Favorite */

    public function addToFavorites(Position $position)
    {
        $favorite = FavoriteJob::firstOrCreate([
            'user_id' => Auth::id(),
            'position_id' => $position->id,
        ]);

        if($favorite->wasRecentlyCreated){
            $message = "Job added to favorites successfully.";
        }
        else{
            $message = "Job is already in favorites.";
        }
        session()->flash('favorite_success', $message);
        // return $this->redirectRoute('favorite', ['user' => Auth::user()], navigate: true);
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
