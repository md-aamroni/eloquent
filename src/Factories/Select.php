<?php

namespace Adecoder\Eloquent\Factories;

use Adecoder\Eloquent\Handler\QueryHandler;
use Adecoder\Eloquent\Handler\FormatHandler;
use Adecoder\Eloquent\Resolver\SelectResolver;
use Adecoder\Eloquent\Interfaces\SqlQueryInterface;
use Adecoder\Eloquent\Interfaces\FactoriesInterface;
use Adecoder\Eloquent\Interfaces\ConnectionInterface;

class Select implements FactoriesInterface, SqlQueryInterface
{
   /**
    * Database Connection
    * @var object
    */
   private object $db;

   /**
    * Object Instantiate
    * @param string $query 
    * @param null|array $param 
    * @param null|bool $itself 
    * @param null|bool $array 
    * @return void 
    */
   public final function __construct(
      private string $query,
      private ?array $param = null,
      private ?bool $itself = false,
      private ?bool $array = false
   ) {
      // @todo: Skip Coding
   }

   /**
    * Connection Instantiate
    * @param ConnectionInterface $connect 
    * @return $this 
    */
   public function map(ConnectionInterface $connect)
   {
      $this->db = $connect->connection();
      return $this;
   }

   /**
    * Execution Response
    * @return mixed 
    */
   public function get()
   {
      $query = new QueryHandler(object: $this->db, query: $this->query, param: $this->param);
      $parse = new SelectResolver(query: $query, itself: $this->itself);
      $maper = new FormatHandler(data: $parse->select()->response(), array: $this->array);
      return $maper->format();
   }
}
