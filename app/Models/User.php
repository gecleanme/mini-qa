<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * You may also declare an inverse $visible array
     * or chain only(['atrrs']) on the model instance
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email',
        'email_verified_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function issues()
    {
        return $this->hasMany(Issue::class, 'reporter_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleted(function (User $user) {
            $user->issues()->delete();
        });

        // Restore posts when a user is restored
        static::restored(function (User $user) {
            $user->issues()->withTrashed()->restore();
        });

        static::creating(function () {
            \Cache::forget('users');
        });

    }


    public function scopeMostIssues(Builder $query)
    {
        return $query
            ->withCount(['issues' => function ($query) {
                $query->where('department', 'Android');
            }])
            ->with(['issues' => function ($query) {
                $query->where('department', 'Android');
            }]) // the relationship was missing
            ->orderBy('issues_count', 'desc')
            ->take(1);
    }

}
