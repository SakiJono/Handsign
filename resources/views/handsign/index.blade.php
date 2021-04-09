<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('募集動画一覧画面') }}
        </h2>
    </x-slot>
    <x-nav-link :href="route('handsign.create')" :active="request()->routeIs('handsign.create')">
        {{ __('手話表現画像') }}
    </x-nav-link>

        @foreach($images as $image)
            <a href="{{ route('thanks_img.show',$image->id) }}">
                <div style="width: 18rem; float:left; margin: 16px;">
                <img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/>
                <p>{{ $image->file_title }}</p>
                </div>
            </a>
        @endforeach

</x-app-layout>
