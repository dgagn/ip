<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Rateable
{
    public function scopeWithRatings(Builder $query)
    {
        $query->leftJoinSub(
            'select post_id, (sum(is_liked) - sum(!is_liked)) as rating from ratings group by post_id',
            'ratings',
            'ratings.post_id',
            'posts.id'
        );
    }

    public function isRatedBy($user = null): bool
    {
        return $user != null && $user->ratings()->where('post_id', $this->id)->exists();
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
        $this->ratings()->create([
            'user_id' => $user->id,
            'is_liked' => false
        ]);
    }

    public function ratingCount(): int
    {
        return $this->ratings()->count();
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
