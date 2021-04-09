<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お礼イラスト詳細画面') }}
        </h2>
    </x-slot>
                <div style="width: 18rem; float:left; margin: 16px;">
                <img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/>
                <p>{{ $image->file_title }}</p>
                </div>
            @if (Auth::user()->is_admin == 1)
                <form action="{{ route('thanks_img.destroy',$image->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit">削除</button>
                </form>
            @endif
</x-app-layout>
