<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Commentable
{
    public function scopeWithCommentsCount(Builder $query)
    {
        $query->leftJoinSub(
            'select post_id, count(*) as no_comments from comments group by post_id',
            'comments',
            'comments.post_id',
            'posts.id'
        );
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
