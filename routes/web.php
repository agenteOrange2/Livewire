<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified'],
'prefix' => 'dashboard'], function(){
    Route::get('/', function(){
        return view('dashboard');
    })->name('dashboard');

    //Category
    Route::group(['prefix' => 'category'], function(){
        Route::get('/', App\Livewire\Dashboard\Category\Index::class)->name('d-category-index');
        Route::get('/create', App\Livewire\Dashboard\Category\Save::class)->name('d-category-create');
        Route::get('/edit/{id}', App\Livewire\Dashboard\Category\Save::class)->name('d-category-edit');
    });
        
    //Post
    Route::group(['prefix' => 'post'], function(){
        Route::get('/', App\Livewire\Dashboard\Post\Index::class)->name('d-post-index');
        Route::get('/create', App\Livewire\Dashboard\Post\Save::class)->name('d-post-create');
        Route::get('/edit/{id}', App\Livewire\Dashboard\Post\Save::class)->name('d-post-edit');
    });

    //Tag
    Route::group(['prefix' => 'tag'], function(){
        Route::get('/', App\Livewire\Dashboard\Tag\Index::class)->name('d-tag-index');
        Route::get('/create', App\Livewire\Dashboard\Tag\Save::class)->name('d-tag-create');
        Route::get('/edit/{id}', App\Livewire\Dashboard\Tag\Save::class)->name('d-tag-edit');
    });

});
    

Route::get('/contact', App\Livewire\Contact\General::class)->name('contact');
Route::get('/person', App\Livewire\Contact\Person::class)->name('person');
Route::get('/company', App\Livewire\Contact\Company::class)->name('company');
Route::get('/detail', App\Livewire\Contact\Detail::class)->name('detail');