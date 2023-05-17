<?php

namespace reiatsu;

use Exception;

class Router
{
    protected static array $routes = [];
    protected static array $route = [];

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public static function getRoute(): array
    {
        return self::$route;
    }

    public static function dispatch($url)
    {
        $url = self::removeQuireString($url);
        if(self::matchRoute($url)){

            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
            
            if(class_exists($controller)){
                
                /**
                 * @var Controller $controllerObj
                 */

                $controllerObj = new $controller(self::$route);
                $controllerObj->getModel();

                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($controllerObj,$action)){
                    $controllerObj->$action();
                    $controllerObj->getView();
                } else {
                    throw new Exception("У объекта {$controller} не найден метод {$action}",404);
                }

            } else {
                throw new Exception("Контроллер {$controller} не найден", 404);
            }

        } else {
            throw new Exception("Страница не найдена",404);
        }
    }

    protected static function removeQuireString($url)
    {
        if($url){
            $params = explode('&',$url,2);
            if(false === str_contains($params[0],'=')){
                return rtrim($params[0],'/');
            }
        }
        return '';
    }

    public static function matchRoute($url): bool
    {
        foreach (self::$routes as $pattern => $route) {
            if(preg_match("#{$pattern}#",$url,$matches)){
                foreach ($matches as $key => $value) {
                    if(is_string($key)){
                        $route[$key] = $value;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    protected static function upperCamelCase($name): string
    {
        return str_replace(' ','',ucwords(str_replace('-',' ',$name)));
    }
    protected static function lowerCamelCase($name): string
    {
        return lcfirst(self::upperCamelCase($name));
    }


}