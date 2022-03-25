<?php

class Route
{
    private static function router($method, $uri){
        if($_SERVER['REQUEST_METHOD']!== $method) return true;
        $url=explode('?',$_SERVER['REQUEST_URI'])[0];
        return($url!=$uri);
    }
    public static function __callStatic(string $name, array $arguments)
    {
      $uri=$arguments[0];
      $cobtroller=$arguments[1];
      $name=strtoupper($name);

      if(self::router($name,$uri)) return;

      if(is_callable($cobtroller)){
          echo $cobtroller();
          return;
      }

      if(is_array($cobtroller)){
          $classController = new $cobtroller[0]();
          $nameMethod =$cobtroller[1];
          echo $classController ->$nameMethod() ; }
    }
}