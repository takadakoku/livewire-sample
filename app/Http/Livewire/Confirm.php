<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Confirm extends Component
{
    public $posts;
    public $requestList;
    public $prefectures;

    public function render()
    {
        return view('livewire.confirm');
    }

    public function mount()
    {
    //     $this->requestList = config('contact.requests');
    //     $this->prefectures = config('contact.prefectures');
	// // sessionに保存した入力値を取得
    //     $this->posts = session()->get('posts');
	// // 入力なしで確認画面に直接アクセスがあったらhomeへリダイレクト
    //     if(empty($this->posts)){
    //         return redirect()->route('home');
    //     }
    }
}
