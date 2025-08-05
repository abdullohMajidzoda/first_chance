<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Position;

class JobForm extends Form
{
    #[Validate('required|min:2')]
    public string $title = '';

    #[Validate('required|min:5')]
    public string $description = '';

    #[Validate('required|min:2')]
    public string $company_name = '';

    #[Validate('required|min:4')]
    public string $company_description = '';

    #[Validate('required')]
    public string $location = '';

    #[Validate('required')]
    public string $salary = '';

    #[Validate('required')]
    public string $employment_type = '';

    #[Validate('required|exists:types,id')]
    public string $type_id = '';

    // protected function rules():array
    // {
    //     return [
    //         'title' => 'required|min:2',
    //         'description' => 'required|min:5',
    //         'company_name' => 'required|min:2',
    //         'company_description' => 'required|min:4',
    //         'location' => 'required',
    //         'salary' => 'required',
    //         'employment_type' => 'required',
    //         'type_id' => 'required|exists:types,id',
    //     ];
    // }

    public function saveJob(){
        $validated = $this->validate();

        $job = Position::create($validated);
        session()->flash('success', 'Job created successfully');
        $this->reset();
        return $job;
    }
}
