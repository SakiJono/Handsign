<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お礼イラスト一覧画面') }}
        </h2>
    </x-slot>
    <x-nav-link :href="route('thanks_img.create')" :active="request()->routeIs('tanks_img.create')">
        {{ __('イラスト投稿ページ') }}
    </x-nav-link>

        @foreach($images as $image)
            <div style="width: 18rem; float:left; margin: 16px;">
            <img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/>
            <p>{{ $image->file_title }}</p>
            </div>
        @endforeach

</x-app-layout>
