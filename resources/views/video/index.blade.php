<x-app-layout>

    <style>
        .section{
            width: 80%;
            margin: auto;
        }

        .content{
            display:flex;
            justify-content: space-between;
            flex-wrap:wrap;
        }

        .contentbox{
            width: 250px;
            margin: 20px;
            text-align: center;
        }

        .button{
            color: #888;
            font-size: 18px;
            font-weight: bold;
        }

        .button:hover{
            color: #333
        }

    </style>

    <section class="section">
        <div class="content">
            @foreach($videos as $video)
            <div class="contentbox">
                <video src="{{ Storage::url($video->file_path) }}" controls></video>
                <form action="{{ route('video.destroy',$video->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="button">動画を削除</button>
                </form>
            </div>
            @endforeach
        </div>
    </section>

</x-app-layout>
