<?php

namespace App\Http\Controllers;

use App\Models\Handsign;
use Illuminate\Http\Request;
use App\Models\Video;
use Auth;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::getMyvideo();

        return view('video.index', [
            "videos" => $videos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function upload(Request $request)
    {
        // return json_encode(['hoge' => $request]);
        // exit();

        $upload_video = $request->savevideo;
        $handsignid = $request->handsign;
        $userid = $request->userid;
        $path = $upload_video->store('video', "public");
        //画像の保存に成功したらDBに記録する
        if ($path) {
            Video::create([
                "file_name" => $upload_video->getClientOriginalName(),
                "file_path" => $path,
                "userid" => $userid,
                "handsignid" => $handsignid,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Handsign::find($id);
        return view('video.recvideo', ['image' => $image]); //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Video::find($id)->delete();
        return redirect()->route('video.index'); ////
    }
}
