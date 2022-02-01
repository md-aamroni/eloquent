<?php

namespace Adecoder\Eloquent\Interfaces;

use PDO;

interface ConnectionInterface
{
   public function connection(): PDO;
}
