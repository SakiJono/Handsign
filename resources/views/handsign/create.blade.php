<x-app-layout>

    <section class="section">
            @include('common.errors')
            <form action="{{ route('handsign') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form">
                    <div>
                        <div>
                            <label for="handsign">手話表現の意味</label>
                            <input type="text" name="handsign" id="handsign" >
                        </div>
                        <div>
                            <input type="file" name="handsign_img" id="handsign_img" accept="image/png, image/jpg, image/jpeg, image/gif">
                        </div>
                        <button type="submit" class="button up"> 画像を追加する </button>
                    </div>
                    <img src="" id="preview" width="200px">
                </div>
            </form>
    </section>

    <script>
    // プレビュー
    const file1 = document.getElementById('handsign_img');
    const preview = document.getElementById('preview');
    file1.onchange = function(e) {
        var file = e.target.files[0];
        var blobUrl = window.URL.createObjectURL(file);
        preview.src = blobUrl;
    }
</script>

    </x-app-layout>
