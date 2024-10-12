<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Chat> $chats
 * @property-read int|null $chats_count
 * @property-read \App\Models\User|null $users
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox query()
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereUserId($value)
 * @mixin \Eloquent
 */
class Inbox extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chats(): hasMany
    {
        return $this->hasMany(Chat::class);
    }
}
