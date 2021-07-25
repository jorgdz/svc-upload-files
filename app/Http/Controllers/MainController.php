<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index () {
        return redirect('/api/documentation');
    }
}
