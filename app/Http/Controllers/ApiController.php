<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function test() {

        return response() -> json([
            'data' => 'test'
        ]);

    }
}
