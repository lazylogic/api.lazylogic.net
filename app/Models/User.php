<?php

namespace App\Models;

use App\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Passport\HasApiTokens;
use Lazylogic\Additive\Models\Additives;

class User extends Authenticatable implements MustVerifyEmail
{
    use UserAttributes, HasApiTokens, Notifiable, Additives;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be visible in serialization.
     *
     * @var array
     */
    protected $visible = [
        'uuid', 'role_type', 'first_name', 'last_name', 'full_name', 'locale', 'isLoggedIn', 'loggedin_at', 'status',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['role_type', 'full_name', 'isLoggedIn'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify( new VerifyEmail() );
    }

    public function issueToken()
    {
        $tokenResult          = $this->createToken( 'Personal Access Token' );
        $auth['access_token'] = $tokenResult->accessToken;
        $auth['token_type']   = 'Bearer';
        $auth['expires_at']   = Carbon::parse( $tokenResult->token->expires_at )->toDateTimeString();

        return $auth;
    }
}