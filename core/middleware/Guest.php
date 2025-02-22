<?php

namespace core\middleware;

class Guest
{
    public function handle()
    {
        if($_SESSION['login'] ?? false)
        {
          header('Location: /');
          exit();
        }
    }
}