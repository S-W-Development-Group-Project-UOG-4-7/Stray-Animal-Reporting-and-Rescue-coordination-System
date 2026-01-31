<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments.user'])
                    ->latest()
                    ->paginate(10);
        
        return response()->json([
            'posts' => $posts,
            'total_posts' => Post::count(),
            'total_comments' => Comment::count()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:article,video,image',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:51200', // 50MB
            'youtube_url' => 'nullable|url'
        ]);

        $postData = [
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'likes' => 0,
            'liked_by' => []
        ];

        // Handle media upload
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $path = $file->store('posts', 'public');
            
            $postData['media_url'] = $path;
            $postData['media_type'] = str_starts_with($file->getMimeType(), 'video/') ? 'uploaded_video' : 'image';
        }
        // Handle YouTube URL
        elseif ($request->youtube_url) {
            $videoId = $this->extractYouTubeId($request->youtube_url);
            if ($videoId) {
                $postData['media_url'] = "https://www.youtube.com/embed/{$videoId}";
                $postData['media_type'] = 'youtube';
            }
        }

        $post = Post::create($postData);

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post->load('user')
        ], 201);
    }

    public function show($id)
    {
        $post = Post::with(['user', 'comments.user'])->findOrFail($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        
        // Authorization check
        if ($post->user_id !== Auth::id() && !Auth::user()->is_admin) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $post->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Post updated successfully',
            'post' => $post
        ]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        // Authorization check
        if ($post->user_id !== Auth::id() && !Auth::user()->is_admin) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Delete associated media
        if ($post->media_url && Storage::disk('public')->exists($post->media_url)) {
            Storage::disk('public')->delete($post->media_url);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }

    public function like($id)
    {
        $post = Post::findOrFail($id);
        $userId = Auth::id();
        
        $likedBy = $post->liked_by ?? [];
        
        if (in_array($userId, $likedBy)) {
            // Unlike
            $likedBy = array_diff($likedBy, [$userId]);
            $post->decrement('likes');
        } else {
            // Like
            $likedBy[] = $userId;
            $post->increment('likes');
        }
        
        $post->update(['liked_by' => $likedBy]);
        
        return response()->json([
            'message' => 'Like updated',
            'likes' => $post->likes,
            'is_liked' => in_array($userId, $post->fresh()->liked_by ?? [])
        ]);
    }

    private function extractYouTubeId($url)
    {
        $pattern = '/^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/';
        preg_match($pattern, $url, $matches);
        return isset($matches[2]) && strlen($matches[2]) === 11 ? $matches[2] : null;
    }
}