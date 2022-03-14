<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Rateable
{
    public function scopeWithRating(Builder $query)
    {
        $query->leftJoinSub(
            'select post_id, (sum(is_liked) - sum(!is_liked)) as rating from likes group by post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        );
    }

    public function isRatedBy(User $user): bool
    {
        return $user->ratings()->where('post_id', $this->id)->exists();
    }

    public function like(User $user)
    {
        $this->ratings()->create([
            'user_id' => $user->id,
            'is_liked' => true
        ]);
    }

    public function dislike(User $user)
    {
        $this->likes()->create([
            'user_id' => $user->id,
            'is_liked' => false
        ]);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
