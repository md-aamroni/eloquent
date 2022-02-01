<?php

namespace Adecoder\Eloquent\Interfaces;

use Adecoder\Eloquent\Interfaces\ConnectionInterface;

interface FactoriesInterface
{
   public function map(ConnectionInterface $connect);
}
