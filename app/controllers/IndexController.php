<?php

class IndexController extends Controller
{
    public function index()
    {
        $this->assets->addCss('css/style.css');
    }
}