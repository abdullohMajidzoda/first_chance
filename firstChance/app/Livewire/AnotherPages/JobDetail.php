<?php

namespace App\Livewire\AnotherPages;

use Livewire\Component;
use App\Models\Position;


class JobDetail extends Component
{
    public $position;

    public function mount(Position $position){
        $this->position = $position;
    }

    public function render()
    {
        return view('livewire.another-pages.job-detail');
    }
}
