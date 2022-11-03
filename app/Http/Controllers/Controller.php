<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function respond($data, $code) {
        return response()->json([
            'data' => $data,
            'code' => $code
        ], $code);
    }

    public function respondSuccess($data, $code = 200) {
        return $this->respond($data, $code);
    }

    public function respondFailure() {

    }
}
