<?php
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Input;
use App\Http\Livewire\Confirm;
use App\Http\Livewire\Complete;

Route::get('/', Input::class)->name('home'); //入力画面
Route::get('/confirm', Confirm::class)->name('confirm'); //確認画面
Route::get('/complete', Complete::class)->name('complete'); //完了画面
// 選手
// 企業
// ファン
// ABU