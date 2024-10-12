<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRolesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $email
 * @property string|null $contact_link
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Chat> $chats
 * @property-read int|null $chats_count
 * @property-read \App\Models\Inbox|null $inbox
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $post_accept
 * @property-read int|null $post_accept_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subject> $subjects
 * @property-read int|null $subjects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereContactLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'contact_link',
        'subjects',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function tasks() : HasManyThrough
    {
        return $this->hasManyThrough(
            Post::class,
            PostAccept::class,
            'executor_id',
            'id',
            'id',
            'post_id'
        );
    }
    public function roles(): belongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function subjects() : BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'user_subjects');
    }

    public function post_accept() : BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_accept');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function inbox(): HasOne
    {
        return $this->hasOne(Inbox::class);
    }

    public function chatsOnlyUser(): BelongsToMany
    {
        return $this->belongsToMany(Chat::class, 'chats_users');
    }
//    public function chatsAsBuddy(): BelongsToMany
//    {
//        return $this->belongsToMany(Chat::class, 'chats_users', 'buddy_id', 'chat_id');
//    }

    public function allChats()
    {
        // Получаем чаты, где пользователь является user_id
        $chatsAsUser = $this->belongsToMany(Chat::class, 'chats_users', 'user_id', 'chat_id')
            ->withPivot('buddy_id')
            ->get();

        // Получаем чаты, где пользователь является buddy_id
        $chatsAsBuddy = $this->belongsToMany(Chat::class, 'chats_users', 'buddy_id', 'chat_id')
            ->withPivot('user_id')
            ->get();

        // Объединяем коллекции и удаляем дубликаты
        return $chatsAsUser->merge($chatsAsBuddy)->unique('id');
    }

    public function isAdmin(): bool
    {
        return $this->roles()->first()->slug === UserRolesEnum::ADMIN->value;
    }
    public function isWorker(): bool
    {
        return $this->roles()->first()->slug === UserRolesEnum::WORKER->value;
    }

    public function reviewsGiven(): HasMany
    {
        return $this->hasMany(Review::class, 'reviewer_id');
    }

    public function reviewsReceived(): HasMany
    {
        return $this->HasMany(Review::class, 'reviewed_id');
    }

    public function myAcceptedPosts(): belongsToMany
    {
        return $this->belongsToMany
        (Post::class, 'post_accept', 'user_id', 'post_id')
            ->withPivot('executor_id');
    }
}


