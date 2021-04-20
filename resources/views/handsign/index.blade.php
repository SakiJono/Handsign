<x-app-layout>

    <style>
        .section{
            width: 80%;
            margin: auto;
        }

        .upform{
            display: flex;
            height: 250px;
        }

        .upbutton{
            margin: 10px 0 0 0;
            width: 200px;
            height: 70px;
            background-color: #7FC161;
            background-size: contain;
            background-image: url("../img/ボタン用.png");
            border-radius: 5px;
            font-size: 18px;
            color: #333;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 2px 5px 5px 0 #333;
        }

        .content{
            display:flex;
            justify-content: space-between;
            flex-wrap:wrap;
        }

        .contentbox{
            width: 250px;
            position: relative;
            margin: 20px;
        }

        .img{
            z-index: 1;
        }

        .button{
            color: #888;
            font-size: 36px;
            font-weight: bold;
            position: absolute;
            z-index: 2;
            top: -15px;
            right: 0px;
        }
    </style>

    <section class="section">
        @if (Auth::user()->is_admin == 1)
        <div class="upform">
            @include('common.errors')
            <form class="mb-6" action="{{ route('handsign') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="handsign">手話表現の意味</label>
                    <input type="text" name="handsign" id="handsign" >
                </div>
                <div>
                    <input type="file" name="handsign_img" id="handsign_img" accept="image/png, image/jpg, image/jpeg, image/gif">
                </div>
                <button type="submit" class="upbutton"> 画像を追加する </button>
            </form>
            <img src="" id="preview">
        </div>
        @endif


        <div class="content">
            @foreach($images as $image)
            <div class="contentbox">
                <div>
                    <a href="{{ route('video.show',$image->id) }}">
                    <img src="{{ Storage::url($image->file_path) }}" class="img"/>
                    </a>
                    {{-- <p>{{ $image->file_title }}</p> --}}
                </div>
                @if (Auth::user()->is_admin == 1)
                <form action="{{ route('handsign.destroy',$image->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="button">×</button>
                </form>
                @endif
            </div>
            @endforeach
        </div>
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
