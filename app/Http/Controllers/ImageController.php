<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){

        $images  = Image::all();

        return response()->json($images);

    }

    public function getBook($id){

        $image  = Image::find($id);

        return response()->json($image);
    }

    public function createBook(Request $request){

        $image = Image::create($request->all());

        return response()->json($image);

    }

    public function deleteBook($id){
        $image  = Image::find($id);
        $image->delete();

        return response()->json('deleted');
    }

    public function updateBook(Request $request,$id){
        $image  = Image::find($id);
        $image->path = $request->input('path');
        $image->date = $request->input('date');
        $image->save();

        return response()->json($image);
    }
}
