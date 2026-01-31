<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'description',
        'media_url',
        'media_type',
        'likes',
        'liked_by'
    ];

    protected $casts = [
        'liked_by' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getMediaPathAttribute()
    {
        if ($this->media_url) {
            return asset('storage/' . $this->media_url);
        }
        return null;
    }
}