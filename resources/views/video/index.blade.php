<x-app-layout>


    <section class="section">
        <div class="content">
            @foreach($videos as $video)
            <div class="contentbox"  id="contentbox">
                <video src="{{ Storage::url($video->file_path) }}" controls class="video"></video>
                <p class="filetitle">{{$video->file_title}}</p>
                @if (Auth::user()->id == $video->userid)
                <form action="{{ route('video.destroy',$video->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="delbutton">×</button>
                </form>
                @endif
            </div>
            @endforeach
        </div>
    </section>


</x-app-layout>
