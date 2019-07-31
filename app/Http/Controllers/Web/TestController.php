<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index( Request $request )
    {
        echo date( 'Ymd His' ) . lang( 'promise.adbc' );

        return \Socialite::with( 'kakao' )->stateless()->redirect()->getTargetUrl();
    }
}