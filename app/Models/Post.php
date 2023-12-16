<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'type',
        // 'category',
        'publish',
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ownerBY(User $user)
    {
        return $user->id === $this->user_id;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
