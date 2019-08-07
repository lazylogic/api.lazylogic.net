<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * POST     /api/v1/auth
     *
     * @param   Request $request
     * @return  mixed
     */
    public function auth( Request $request )
    {
        return $request->user();
    }

}