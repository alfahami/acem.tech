image-php.txt<?php

/**
 * Class Errors
 *
 * @package \\${NAMESPACE}
 */
class Errors extends Controller
{
    public function  __construct()
    {
//        $this->index();
    }

    public function index(){
        $this->view('pages/abort');
    }
}
