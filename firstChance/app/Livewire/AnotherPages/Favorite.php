<?php

namespace App\Livewire\AnotherPages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Position;
use App\Models\FavoriteJob;

class Favorite extends Component
{
    
    public function mount(User $user)
    {
        if (Auth::id() !== $user->id) {
            abort(403, "You cannot view other people's favorites");
        }
    }

    public function destroyFavorite(Position $position)
    {
        FavoriteJob::where('position_id', $position->id)->delete();
        session()->flash('favorite_removed', 'Job removed from favorites.');

        // return $this->redirectRoute('favorite', ['user' => Auth::user()], navigate: true);
    }

    

    public function render()
    {
        return view('livewire.another-pages.favorite',[
            'items' => User::with('favorites')->get(),
        ]);
    }
}
