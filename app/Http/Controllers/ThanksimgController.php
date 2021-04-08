<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Thanks_img;

class ThanksimgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uploads = Thanks_img::orderBy("id", "desc")->get();

        return view("tanks_img.index", [
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
        return view('tanks_img.create'); //
    }

    public function upload(Request $request)
    {
        $request->validate([
            'thanksimg' => 'required|file|image|mimes:png,jpeg,jpg,gif',
            'file_title' => 'required | max:191',
        ]);
        $upload_image = $request->file('thanksimg');
        $title = $request->input('file_title');


        if ($upload_image) {
            //アップロードされた画像を保存する
            $path = $upload_image->store('uploads', "public");
            //画像の保存に成功したらDBに記録する
            if ($path) {
                Thanks_img::create([
                    "file_name" => $upload_image->getClientOriginalName(),
                    "file_path" => $path,
                    "file_title" => $title,
                ]);
            }
        }

        return redirect("/thanks_img");
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
        //
    }    //
}
