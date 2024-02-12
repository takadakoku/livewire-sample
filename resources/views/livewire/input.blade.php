<div>
    <form wire:submit.prevent="confirm">
        @csrf
            <div>
                <span >お名前（必須）</span>
                <button>HOGE</button>
                <input
                    wire:model="posts.name"
                    type="text" placeholder="鈴木一郎">
                @error('posts.name') <span>{{ $message }}</span> @enderror
            </div>
            （略）
        <button>内容確認</button>
    </form>
    <div style="text-align: center">
        <button wire:click="increment">+</button>
        <h1>{{ $count }}</h1>
    </div>
</div>