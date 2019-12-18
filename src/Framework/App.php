<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class App
{
    public function run(Request $request, array $routesMap): Response
    {
        $path = $request->getPathInfo();

        if (!empty($routesMap[$path])) {
            $callback = $routesMap[$path];
            if (!is_string($callback)) {
                return call_user_func($callback, $request);
            }

            // Découverte du controller :
            $className = substr($callback, 0, strpos($callback, "@"));
            $methodName = substr($callback, strpos($callback, "@") + 1);

            $controller = new $className();
            $callback = [$controller, $methodName];
            return call_user_func($callback, $request);
        }

        return new Response("404 !", 404);
    }
}
