<x-app-layout>

    <style>
        .section{
            width: 70%;
            margin: 30px auto;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .camera{
            position: relative;
            background-color: #a3a3a3;
            width: 600px;
            height: 60vh;
        }

        .localvideo{
            width: 600px;
            position: absolute;
            z-index: 1;
        }

        .testvideo{
            width: 600px;
            position: absolute;
            z-index: 2;
        }

        .buttonbox{
            display: flex;
            justify-content: center;
        }

        .buttons{
            position: relative;
            margin: 10px;
            width: 200px;
            height: 70px;
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

        .beforebutton{
            z-index: 3;
            position: absolute;
        }

        .clickbutton{
            position: absolute;
            z-index: 1;
            top: 0;
        }

        .recbutton{
            display: none;
        }

        .img{
            width:250px;
        }

    </style>

    <section class="section">
        <div >
            <img src="{{ Storage::url($image->file_path) }}" class="img">
            <p>{{ $image->file_title }}の手話表現を録画してください</p>
            <p>{{Auth::user()->is_admin}}</p>
        </div>

        <div>
            <div class="camera">
                <video id="localvideo" autoplay class="localvideo"></video>
                <video id="testvideo" class="testvideo"></video>
            </div>
            <div class="buttonbox">
                <div class="buttons">
                    <button id="start" class="upbutton beforebutton">カメラの起動</button>
                    <button id="stop" class="upbutton clickbutton">カメラの停止</button>
                </div>
                <div id="recbutton" class="buttons recbutton">
                    <button id="record" class="upbutton beforebutton">5秒間の録画開始</button>
                    <button type="submit" id="savebutton" class="upbutton clickbutton"> 保存 </button>
                </div>
            </div>
        </div>

    </section>



<script>

const localvideo = document.getElementById('localvideo');
const testvideo = document.getElementById('testvideo');
const start = document.getElementById('start');
const stop = document.getElementById('stop');
const record = document.getElementById('record');
const savevideo = document.getElementById('savevideo');
const savebutton = document.getElementById('savebutton');
const recbutton = document.getElementById('recbutton');
let record_data = [];

// カメラの起動
    start.onclick = function(){
        stop.style.zIndex = 3;
        recbutton.style.display = "block";
        startVideo();
    }

    function startVideo() {
        navigator.mediaDevices.getUserMedia({ video: true, audio: false })
        .then(function (stream) {
            localvideo.srcObject = stream;
            localvideo.playsInline = true;
            const recorder = new MediaRecorder(stream);
            record.onclick = function(){
                savebutton.style.zIndex = 3;
                recorder.start();
                function timeup() {
                    recorder.stop();
                };
                setTimeout(timeup, 5000);
            };
            recorder.ondataavailable = function (e) {
            var testvideo = document.getElementById('testvideo');
            testvideo.setAttribute('controls', '');
            var outputdata = window.URL.createObjectURL(e.data);
            record_data.push(e.data)
            testvideo.style.display = "block";
            testvideo.src = outputdata;

            };
        }).catch(function (error) { // 失敗時の処理はこちら.
        console.error('mediaDevice.getUserMedia() error:', error);
        return;
        });
            savebutton.onclick = function(){
                saveStreameVideo(record_data);
            }
    }


// カメラの停止
    stop.onclick = function(){
        stop.style.zIndex = 1;
        stopStreamedVideo(localvideo);
    }

    function stopStreamedVideo(videoElem) {
        const stream = videoElem.srcObject;
        const tracks = stream.getTracks();

        tracks.forEach(function(track) {
            track.stop();
        });

        videoElem.srcObject = null;
    }

// 保存処理
    function saveStreameVideo (record_data){
    var blob = new Blob(record_data, { type: 'video/webm' });
    const id = '{{ $image->id }}'
    const userid = '{{Auth::user()->is_admin}}'
    // console.log(blob.size);
    // document.getElementById('savevideo').value = blob.size;
    // window.URL.revokeObjectURL(url)
    const data = new FormData();
    data.append('savevideo', blob, new Date() +'video.webm');
    data.append('handsign', id);
    data.append('userid', userid);
    axios.post('/video', data, {
        headers: { 'content-type': 'multipart/form-data' }
    })
    .then(res => {
    console.log(res);
    window.location.href = '{{ url('/video') }}';
    }).catch(error => {
        new Error(error)
    });
    }

</script>


</x-app-layout>
