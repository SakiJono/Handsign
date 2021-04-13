<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿動画一覧画面') }}
        </h2>
    </x-slot>
    <x-nav-link :href="route('handsign.create')" :active="request()->routeIs('handsign.create')">
        {{ __('投稿動画') }}
    </x-nav-link>

    @foreach($videos as $video)
                <div style="width: 18rem; float:left; margin: 16px;">
                <video src="{{ Storage::url($video->file_path) }}" style="width:100%;"></video>
                </div>
        @endforeach

</x-app-layout>
