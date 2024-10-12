<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $description
 * @property int $price
 * @property int $subject_id
 * @property string $deadline
 * @property int $responce
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $post_accept
 * @property-read int|null $post_accept_count
 * @property-read \App\Models\Subject $subject
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereResponce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subject() : BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function postAccept() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_accept');
    }

    public function isConfirmed(): bool
    {
        return $this->status === PostStatusEnum::CONFIRMED->value;
    }
    public function isAgreed(): bool
    {
        return $this->status === PostStatusEnum::AGREED->value;
    }

    use HasFactory;
    protected $guarded = false;
}
