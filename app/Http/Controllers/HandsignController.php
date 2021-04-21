<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Handsign;
use Auth;

class HandsignController extends Controller
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
        $uploads = Handsign::orderBy("id", "desc")->get();

        return view("handsign.index", [
            "images" => $uploads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('handsign.create');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'handsign_img' => 'required|file|image|mimes:png,jpeg,jpg,gif',
            'handsign' => 'required | max:191',
        ]);
        $upload_image = $request->file('handsign_img');
        $title = $request->input('handsign');


        if ($upload_image) {
            //アップロードされた画像を保存する
            $path = $upload_image->store('handsign', "public");
            //画像の保存に成功したらDBに記録する
            if ($path) {
                Handsign::create([
                    "file_name" => $upload_image->getClientOriginalName(),
                    "file_path" => $path,
                    "file_title" => $title,
                ]);
            }
        }

        return redirect("/handsign");
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
        //
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
        $result = Handsign::find($id)->delete();
        return redirect()->route('handsign.index'); //
    }
}
