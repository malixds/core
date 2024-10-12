<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Review extends Model
{
    use HasFactory;

    protected $guarded = false;
    public function user(): belongsTo
    // Получить модель (пользователя), к которому привязан отзыв.
    {
        return $this->belongsTo(User::class, 'reviewed_id');
    }

    // Получить пользователя, который оставил отзыв.
    public function reviewer(): belongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}
