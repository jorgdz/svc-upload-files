<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponse
{
	private function successResponse ($data, $code) {
		return response()->json(['data' => $data], $code);
	}

	protected function errorResponse ($message, $code) {
		return response()->json([
            'timestamps' => date('Y-m-d H:i:s'),
            'error' => $message,
            'code' => $code
        ], $code);
	}
}
