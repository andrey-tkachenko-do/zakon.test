<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OautProviders
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $provider_user_id
 * @property string|null $access_token
 * @property string|null $refresh_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OautProviders newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OautProviders newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OautProviders query()
 * @method static \Illuminate\Database\Eloquent\Builder|OautProviders whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OautProviders whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OautProviders whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OautProviders whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OautProviders whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OautProviders whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OautProviders whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OautProviders whereUserId($value)
 */
class OautProviders extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'user_id',
        'provider',
        'provider_user_id',
        'access_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'access_token',
        'refresh_token',
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';
}
