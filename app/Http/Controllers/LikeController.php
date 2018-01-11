<?php
/**
 * Created by PhpStorm.
 * User: wlinde
 * Date: 11-1-18
 * Time: 10:43
 */

namespace App\Http\Controllers;


use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
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

    // Adds a like to the likes table, using $id as image_id and the id of the
    // logged-in user as user_id.
    public function likeImage($id) {
        // If not logged in, send 401
        if (!Auth::check() || !Auth::id()) {
            return response('Unauthorized.', 401);
        }

        $like = new Like;
        $like->image_id = $id;
        $like->user_id = Auth::id();

        // If save failed, the user might already have liked the image
        // TODO verify this error response is sent in production
        if (!$like->save()) {
            return response('error (image already liked?)', 500);
        }

        return response()->json($like);
    }

    // Removed a like with $id as image_id and the logged-in user's id as user_id.
    public function unlikeImage($id) {
        // If not logged in, send 401
        if (!Auth::check() || !Auth::id()) {
            return response('Unauthorized.', 401);
        }

        $like = Like::where('image_id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $like->delete();

        return response('unliked');
    }

}