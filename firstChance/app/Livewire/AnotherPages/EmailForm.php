<?php

namespace App\Livewire\AnotherPages;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class EmailForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:2')]
    public $name;

    #[Validate('required|email')]
    public $email;

    #[Validate('required|min:5')]
    public $portfolio;

    #[Validate('required|min:5')]
    public $letter;

    #[Validate('required|file|mimes:pdf,doc,docx|max:10188')]
    public $cv;

    public function sendEmail(){
        $validated = $this->validate();

        Mail::to('majidzodaabdulloh@gmail.com')->send(new ContactFormMail($validated, $this->cv));

        session()->flash('send_email', 'Сообщение отправлено!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.another-pages.email-form');
    }
}
