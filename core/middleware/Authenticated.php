<?php

namespace core\middleware;

class Authenticated
{
      public function handle()
      {
          if (!$_SESSION['user'] ?? false){
              header('Location: /');
              exit();

          }
      }
}