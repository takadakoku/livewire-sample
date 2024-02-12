<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Input extends Component
{

    public $posts; // ユーザが入力する値
    public $requestList; // チェックボックスで表示するリスト
    public $prefectures; // selectで表示する都道府県のリスト
    public $count = 0;

    public function render()
    {
        return view('livewire.input');
    }
    public function mount()
    {
	// チェックボックスで表示すデータをconfigファイルから取得する
        $this->requestList = config('contact.requests');
	// チェックボックスで表示すデータをconfigファイルから取得する
        $this->prefectures = config('contact.prefectures');
	// 確認画面から入力に戻ったときのため、sessionに保存した入力値を取得
        $this->posts = session()->get('posts');
    }

    public function confirm()
    {
	// バリデーションの実行
        // $this->validate();

        // 入力されたpostプロパティを、セッション名'posts'で
        // セッションに保存
        session()->put('posts', $this->posts);

        // 確認画面へリダイレクト
        return redirect()->route('confirm');
    }
    public function increment():int
    {
        return $this->count++;
    }

}
