<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function hello(Request $request)
    {
        $name = $request->get('name', 'World');
        return new Response("Hello $name", 200);
    }
}
