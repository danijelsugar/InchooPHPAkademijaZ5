<?php

class IndexController
{
    public function index()
    {
        $view = new View();
        $posts = [
            'First post',
            'Second post'
        ];

        $view->render('index', [
            "posts" => $posts
        ]);
    }
}