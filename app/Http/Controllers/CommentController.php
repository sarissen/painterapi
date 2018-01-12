<?php
/**
 * Created by PhpStorm.
 * User: wlinde
 * Date: 11-1-18
 * Time: 11:03
 */

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
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

    /**
     * @param Request $request
     * @param int $id of image to add comment to
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function addComment(Request $request, $id) {
        // If not logged in, send 401
        if (!Auth::check() || !Auth::id()) {
            return response('Unauthorized.', 401);
        }

        $comment = new Comment;

        $comment->text = $request->input('text');
        $comment->image_id = $id;
        $comment->user_id = Auth::id();

        if (!$comment->save()) {
            return response('failed to add comment', 500);
        }

        $comment->author = Auth::user()->name;

        return response()->json($comment);
    }

    /**
     * @param Request $request
     * @param int $id of comment to edit
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function editComment(Request $request, $id) {
        // If not logged in, send 401
        if (!Auth::check() || !Auth::id()) {
            return response('Unauthorized.', 401);
        }

        // Find comment with given id, if not found then respond with 404
        $comment = Comment::where('id', $id)->firstOrFail();

        // Check if found comment was posted by the logged in user
        if ($comment->user_id !== Auth::id()) {
            return response('unauthorized', 401);
        }

        $comment->text = $request->get('text');

        if (!$comment->save()) {
            return response('failed to edit comment', 500);
        }

        return response()->json($comment);
    }

    public function deleteComment($id) {
        // If not logged in, send 401
        if (!Auth::check() || !Auth::id()) {
            return response('Unauthorized.', 401);
        }

        // Find comment with given id, if not found then respond with 404
        $comment = Comment::where('id', $id)->firstOrFail();

        // Check if found comment was posted by the logged in user
        if ($comment->user_id !== Auth::id()) {
            return response('unauthorized', 401);
        }

        $comment->delete();

        return response('comment removed');
    }
}