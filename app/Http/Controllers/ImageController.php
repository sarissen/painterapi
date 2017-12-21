<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

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

    public function getImage($id){

        $image  = Image::find($id);

        return response()->json($image);
    }

    public function createImage(Request $request){

        $image = Image::create($request->all());

        $imageData = $request->get('imageData');

        $parts = explode(',', $imageData);
        $imageData = base64_decode($parts[1]);

        $dir = '/images/' . $image['id'];
        $path = $dir . '/image.png';

        $image['path'] = 'http://' . $request->getHttpHost() . $path;

        if(!is_dir(app()->basePath() . '/public' . $dir)){
            mkdir(app()->basePath() . '/public' . $dir, 0777, true);
        }

        file_put_contents(app()->basePath() . '/public' . $path, $imageData);

        list($width, $height, $type) = getimagesize(app()->basePath() . '/public' . $path);

        if($type !== IMAGETYPE_PNG){
            unlink(app()->basePath() . '/public' . $path);
            $image->delete();
            return response()->json('deleted');
        }

        $image->save();

        return response()->json($image);
    }

    public function deleteImage($id){
        $image  = Image::find($id);
        $image->delete();

        return response()->json('deleted');
    }

    public function updateImage(Request $request, $id){
        $image  = Image::find($id);
        $image->path = $request->input('path');
        $image->save();

        return response()->json($image);
    }

    public function getImageData(Request $request){
        $url = $request->get('url');

        list($width, $height, $type, $attr) = getimagesize($url);

        $palette = Palette::fromFilename($url);

        $headers = get_headers($url, true);
        $filesize = $headers['Content-Length'];

        $extractor = new ColorExtractor($palette);
        $colors = $extractor->extract(5);

        foreach ($colors as $index => $color) {
            $colors[$index] = Color::fromIntToHex($color);
        }

        $result = ['width' => $width, 'height' => $height, 'size' => $filesize, 'colors' => $colors];

        return response()->json($result);
    }
}
