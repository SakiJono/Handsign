<x-app-layout>

    <section class="navsection">

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
                    <button type="submit" class="delbutton">×</button>
                </form>
                @endif
            </div>
            @endforeach
        </div>
        @if (Auth::user()->is_admin == 1)
        <div class="pagelink2">
            <a href="{{route('handsign.create')}}" class="pagelink">画像の追加</a>
        </div>
        @endif
    </section>

    </x-app-layout>
