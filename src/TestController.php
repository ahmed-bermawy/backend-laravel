<?php

namespace Ollakalla\Backend;
use App\Http\Controllers\Controller;


class TestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Hi Ahmed';
    }
}
