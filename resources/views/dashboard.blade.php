<x-app-layout>

    <style>
        @import url(http://fonts.googleapis.com/earlyaccess/notosansjp.css);

        .navisection{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .img{
            width: 40%;

        }

        .link{
            width: 30%;
            height: 50px;
            text-align: center;
            vertical-align: middle;
            font-size: 18px;
            color: #333;
            font-weight: bold;
            font-family: 'Noto Sans JP', sans-serif;

        }

    </style>

    <div class="explanation" id="explanation">

    </div>


    <section class="navisection">
        <img src="img/hana1.png" alt="" class="img">
        <a href="{{ route('handsign.index')}}" class="link">募集中の手話表現を見る</a>
        {{-- @foreach($handsigns as $handsign)
        <a href="{{ route('thanks_img.show',$handsign->id) }}">
            <div>
                <img src="{{ Storage::url($handsign->file_path) }}" style="width:100%;"/>
                <p>{{ $handsign->file_title }}</p>
            </div>
        </a>
        @endforeach --}}
    </section>

    <section class="navisection">
        <a href="{{ route('video.index')}}" class="link">投稿済みの動画を見る</a>
        <img src="img/hana2.png" alt="" class="img">
        {{-- @foreach($videos as $video)
        <div>
            <video src="{{ Storage::url($video->file_path) }}" controls style="width:100px;"></video>
        </div>
        @endforeach --}}
    </section>

    <section class="navisection">
        <img src="img/hana3.png" alt="" class="img">
        <a href="{{ route('thanks_img.index')}}" class="link">手話イラストを見る</a>
        {{-- @foreach($thanksimgs as $thanksimg)
        <div>
            <img src="{{ Storage::url($thanksimg->file_path) }}" style="width:100px;"/>
            <p>{{ $thanksimg->file_title }}</p>
        </div>
        @endforeach --}}
    </section>

</x-app-layout>
