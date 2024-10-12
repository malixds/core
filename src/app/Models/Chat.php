<?php

namespace App\Models;

use Database\Factories\ChatFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *
 *
 * @property int $id
 * @property int $sender_id
 * @property int $received_id
 * @property int $inbox_id
 * @property string $last_message
 * @property int|null $unseen_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Inbox> $inboxes
 * @property-read int|null $inboxes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereInboxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereLastMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereReceivedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereUnseenNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Chat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users() : belongsToMany
    {
        return $this->belongsToMany(User::class, 'chats_users');
    }

    public function messages() : HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function lastMessage(): HasOne
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }

    public function inboxes() : belongsToMany
    {
        return $this->belongsToMany(Inbox::class);
    }

    protected static function newFactory()
    {
        return new ChatFactory();
    }
}
