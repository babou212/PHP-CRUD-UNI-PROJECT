<?php

namespace App\Models\post;

use App\Models\comment\Comment;
use App\Models\user\User;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements CanVisit
{
    use HasFactory, HasVisits;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'cost',
        'image_uri',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
