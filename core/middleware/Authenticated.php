<?php

namespace core\middleware;

class Authenticated
{
      public function handle()
      {
          if (!$_SESSION['login'] ?? false){
              header('Location: /login');
              exit();

          }
      }
}