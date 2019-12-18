<?php

use App\Controller\HelloController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

return [
    "/" => function () {
        return new Response("Accueil", 200);
    },
    "/blog" => function () {
        return new Response("Blog !", 200);
    },
    "/hello" => "App\Controller\HelloController@hello"
];
