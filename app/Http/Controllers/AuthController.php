<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * AuthController
 */
class AuthController extends Controller
{
    /**
     * logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout(Request $request) {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Good by user.'
        ]);
    }

    /**
     * user
     *
     * @param  mixed $request
     * @return void
     */
    public function user (Request $request) {
        return response()->json($request->user());
    }
}
