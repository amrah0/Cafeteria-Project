<?php 

namespace core\middleware;

class Middleware
{
    public const Map=[
      'guest' => Guest::class,
      'auth' => Authenticated::class
    ];

    public static function resolve($key)
    {
        if(!$key) {
          return;
        }

        $middleware = static::Map[$key] ?? false;

        if(!$middleware){
          throw new \Exception("No matching middleware found for key '{$key}'.");
        }

        (new $middleware)->handle();
    }
    
}