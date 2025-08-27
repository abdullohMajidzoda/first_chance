<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\MainPage\MainPage;
use App\Livewire\AnotherPages\JobDetail;
use App\Livewire\AnotherPages\JobCreate;
use App\Livewire\AnotherPages\EmailForm;
use App\Livewire\User\UserForm;
use App\Livewire\User\LoginForm;
use App\Livewire\AnotherPages\Favorite;
use App\Livewire\AnotherPages\About;
use App\Livewire\AnotherPages\Contact;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', MainPage::class)->name('home');
Route::get('/job-detail/{position}', JobDetail::class)->name('jobDetail');
Route::get('/job-create', JobCreate::class)->name('jobCreate');
Route::get('/email-form', EmailForm::class)->name('emailForm');
Route::get('/register', UserForm::class)->name('register');
Route::get('/login', LoginForm::class)->name('login');
Route::get('/favorite/{user}', Favorite::class)->name('favorite');
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
