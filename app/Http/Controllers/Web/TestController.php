<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index( Request $request )
    {
        $this->log( 'index()' );
        $this->debug( 'index()' );
        \Log::debug( '@@@@@@@@@@@@@@@@@@@@' );
        echo date( 'Ymd His' );
    }
}