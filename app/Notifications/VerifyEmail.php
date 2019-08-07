<?php

namespace App\Notifications;

use App\Models\TemporaryToken;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\URL;
use Lazylogic\Additive\Logging;

class VerifyEmail extends VerifyNotification
{
    use Queueable, Logging;

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail( $notifiable )
    {
        $verificationUrl = $this->verificationUrl( $notifiable );

        if ( static::$toMailCallback ) {
            return call_user_func( static::$toMailCallback, $notifiable, $verificationUrl );
        }

        return ( new MailMessage() )
            ->subject( Lang::getFromJson( 'Verify Email Address' ) )
            ->line( Lang::getFromJson( 'Please click the button below to verify your email address.' ) )
            ->action( Lang::getFromJson( 'Verify Email Address' ), $verificationUrl )
            ->line( Lang::getFromJson( 'If you did not create an account, no further action is required.' ) );
    }

    protected function verificationUrl( $notifiable )
    {
        $params = URL::buildSignedRouteParams(
            'verify.email',
            ['id' => $notifiable->uuid],
            Date::now()->addMinutes( config( 'auth.verification.expire', 60 ) )
        );

        TemporaryToken::updateOrCreate( [
            'uuid'  => $notifiable->uuid,
            'email' => $notifiable->email,
        ], [
            'token'      => $params['signature'],
            'created_at' => Date::now(),
        ] );

        return env( 'WWW_URL' ) . URL_VERIFY_EMAIL . '?' . http_build_query( $params );
    }

}