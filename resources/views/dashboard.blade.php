<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    <p>募集中の手話表現</p>
        @foreach($handsigns as $handsign)
            <a href="{{ route('thanks_img.show',$handsign->id) }}">
                <div style="width: 18rem; float:left; margin: 16px;">
                <img src="{{ Storage::url($handsign->file_path) }}" style="width:100%;"/>
                <p>{{ $handsign->file_title }}</p>
                </div>
            </a>
        @endforeach

    <p>投稿したビデオ</p>
        @foreach($videos as $video)
                <div style="width: 18rem; float:left; margin: 16px;">
                <img src="{{ Storage::url($video->file_path) }}" style="width:100%;"/>
                <p>{{ $video->file_title }}</p>
                </div>
        @endforeach

    <p>イラスト一覧</p>
        @foreach($tanksimgs as $tanksimg)
                <div style="width: 18rem; float:left; margin: 16px;">
                <img src="{{ Storage::url($tanksimg->file_path) }}" style="width:100%;"/>
                <p>{{ $tanksimg->file_title }}</p>
                </div>
        @endforeach
</x-app-layout>
