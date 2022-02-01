<?php

namespace Adecoder\Eloquent\Handler;

use PDO;
use PDOException;

class QueryHandler
{
   /**
    * Connection Handler Object
    * @var object
    */
   public object $connect;

   /**
    * Object Instantiate
    * @param PDO $object 
    * @param string $query 
    * @param null|array $param 
    * @return void 
    */
   public final function __construct(private PDO $object, private string $query, private ?array $param = null)
   {
      $this->connect = $object->prepare($this->query);
   }

   /**
    * Query Resolver
    * @return $this|string|void 
    */
   public function resolve()
   {
      try {
         if (!empty($this->connect->errorInfo()[1])) {
            throw new PDOException();
         }
         $this->connect->execute($this->param);
         return $this;
      } catch (\Throwable $th) {
         return $th->getMessage();
      }
   }
}
