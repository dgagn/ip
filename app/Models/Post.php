<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

/**
 * @method static withRatings()
 * @method static withCommentsCount()
 */
class Post extends Model
{
    use HasFactory;
    use Rateable;
    use Commentable;

    protected $with = ['author'];

    public static function withRatingsAndCommentsCount()
    {
        return self::withRatings()->withCommentsCount()->get();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault([
            'name' => 'Anonyme'
        ]);
    }
}
