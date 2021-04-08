<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お礼イラスト一覧画面') }}
        </h2>
    </x-slot>
    <x-nav-link :href="route('tanks_img.create')" :active="request()->routeIs('tanks_img.create')">
        {{ __('イラスト投稿ページ') }}
    </x-nav-link>

</x-app-layout>
