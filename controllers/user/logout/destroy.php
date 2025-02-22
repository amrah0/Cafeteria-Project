<?php
use core\Session;

Session::destroy();

header('Location: /login');