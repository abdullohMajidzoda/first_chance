<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\MainPage\MainPage;
use App\Livewire\AnotherPages\JobDetail;
use App\Livewire\AnotherPages\JobCreate;
use App\Livewire\AnotherPages\EmailForm;


// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', MainPage::class)->name('home');
Route::get('/job-detail/{position}', JobDetail::class)->name('jobDetail');
Route::get('/job-create', JobCreate::class)->name('jobCreate');
Route::get('/email-form', EmailForm::class)->name('emailForm');
