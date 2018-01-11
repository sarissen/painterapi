<?php
/**
 * Created by PhpStorm.
 * User: wlinde
 * Date: 11-1-18
 * Time: 11:03
 */

namespace App\Http\Controllers;

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

    public function addComment($id) {
        // If not logged in, send 401
        if (!Auth::check() || !Auth::id()) {
            return response('Unauthorized.', 401);
        }

        return response();
    }

    public function editComment($id) {
        // If not logged in, send 401
        if (!Auth::check() || !Auth::id()) {
            return response('Unauthorized.', 401);
        }

        return response();
    }

    public function deleteComment($id) {
        // If not logged in, send 401
        if (!Auth::check() || !Auth::id()) {
            return response('Unauthorized.', 401);
        }

        return response();
    }
}