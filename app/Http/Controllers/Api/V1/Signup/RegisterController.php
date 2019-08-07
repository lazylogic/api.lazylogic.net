<?php

namespace App\Http\Controllers\Api\V1\Signup;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * POST     /api/v1/signup/register
     *
     * @param   Request $request
     * @return  mixed
     */
    public function register( Request $request )
    {
        $user = $this->create( $this->validator( $request ) );

        $user = User::find( 5 );

        event( new Registered( $user ) );

        Auth::guard()->login( $user );

        return ['user' => $user, 'auth' => $user->issueToken()];
    }

    /**
     * POST     /api/v1/signup/register/{social}
     */
    public function social( Request $request, string $social )
    {
        return 'OK';
    }

    protected function validator( Request $request )
    {
        $input                                = $request->all();
        $input['uuid']                        = b64uuid();
        $input['passwd_confirm_confirmation'] = $request->get( 'passwd' );

        $validator = Validator::make( $input, [
            'uuid'           => 'bail|required|unique:users',
            'first_name'     => 'bail|required',
            'last_name'      => 'bail|required',
            'email'          => 'bail|required|email|unique:users',
            'passwd'         => 'bail|required|between:4,32|regex:' . PATTERN_PASSWD,
            'passwd_confirm' => 'bail|required|confirmed',
        ], [
            'uuid.required'            => lang( 'validation.uuid.required' ),
            'uuid.unique'              => lang( 'validation.uuid.unique' ),
            'first_name.required'      => lang( 'validation.first_name.required' ),
            'last_name.required'       => lang( 'validation.last_name.required' ),
            'email.required'           => lang( 'validation.email.required' ),
            'email.email'              => lang( 'validation.email.email' ),
            'email.unique'             => lang( 'validation.email.unique' ),
            'passwd.required'          => lang( 'validation.passwd.required' ),
            'passwd.between'           => lang( 'validation.passwd.between' ),
            'passwd.regex'             => lang( 'validation.passwd.regex' ),
            'passwd_confirm.confirmed' => lang( 'validation.passwd.confirmed' ),
        ] );

        if ( $validator->fails() ) {
            return Response::badRequest( lang( 'validation.signup' ), $validator->errors() );
        }

        unset( $input['passwd_confirm'], $input['passwd_confirm_confirmation'] );
        return $input;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $input
     * @return \App\User
     */
    protected function create( array $input )
    {
        $input['role']   = @$input['role'] ? ( TYPE_ROLL[$input['role']] ?: ROLE_MEMBER ): ROLE_MEMBER;
        $input['passwd'] = \DB::raw( "PASSWORD('{$input['passwd']}')" );
        $input['status'] = STATUS_INITIAL;
        $input['locale'] = app()->getLocale();

        return User::create( $input );
    }

}