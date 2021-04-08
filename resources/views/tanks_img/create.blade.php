<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お礼イラスト投稿画面＊admin') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            @include('common.errors')
                <form class="mb-6" action="{{ route('tanks_img.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="filename">ファイル名</label>
                    <input type="text" name="filename" id="filename">
                </div>
                <div>
                    <input type="file" name="tanksimg" id="tanksimg">
                </div>
                <button type="submit"> Create </button>
                </form>
            </div>
        </div>
        <img src="" id="preview" width="200px">
    </div>
</div>

<script>
    // プレビュー
    const file1 = document.getElementById('tanksimg');
    const preview = document.getElementById('preview');
    file1.onchange = function(e) {
        var file = e.target.files[0];
        var blobUrl = window.URL.createObjectURL(file);
        preview.src = blobUrl;
    }
</script>

</x-app-layout>
