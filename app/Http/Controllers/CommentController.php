<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $post = Post::findOrFail($postId);

        $comment = Comment::create([
            'post_id' => $postId,
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);

        return response()->json([
            'message' => 'Comment added successfully',
            'comment' => $comment->load('user')
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        
        // Authorization check
        if ($comment->user_id !== Auth::id() && !Auth::user()->is_admin) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $comment->update(['content' => $request->content]);

        return response()->json([
            'message' => 'Comment updated successfully',
            'comment' => $comment->load('user')
        ]);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        
        // Authorization check
        if ($comment->user_id !== Auth::id() && !Auth::user()->is_admin) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }
}