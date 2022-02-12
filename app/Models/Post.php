<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

/**
 * Post model
 *
 * @property int        $id
 * @property string     $title
 * @property string     $content
 * @property int        $user_id
 * @property PostStatus $status
 *
 * @package App\Models
 */
class Post extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => PostStatus::class,
    ];

    /**
     * Owner user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Convert the model to the searchable array.
     *
     * @return array<string, string>
     */
    public function toSearchableArray(): array
    {
        return [
            'title'   => $this->title,
            'content' => $this->content,
        ];
    }
}
