<?php

namespace Hero\HelloComposer\Controllers;

use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{

    public function index()
    {
        echo config('hi-composer.hello');
        echo config('hi-composer.hi');
    }
}