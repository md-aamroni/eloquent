<?php

namespace Adecoder\Eloquent\Resolver;

use PDO;
use Adecoder\Eloquent\Handler\QueryHandler;
use Adecoder\Eloquent\Interfaces\ResolverInterface;

class CreateResolver implements ResolverInterface
{
   /**
    * QueryHandler Object
    * @var QueryHandler
    */
   private QueryHandler $create;

   /**
    * Result Handler
    * @var array|object
    */
   private array|object $result;

   /**
    * Object Instantiate
    * @param QueryHandler $query 
    * @return void 
    */
   public final function __construct(private QueryHandler $query)
   {
      $this->create = $query->resolve();
   }

   /**
    * Create Object
    * @return object 
    */
   public function create(PDO $db): object
   {
      $this->result = array(
         'last_insert_id' => $db->lastInsertId(),
         'total_inserted' => $this->create->connect->rowCount()
      );
      return $this;
   }

   /**
    * Response Handler
    * @return mixed 
    */
   public function response(): mixed
   {
      return !empty($this->result['last_insert_id']) && ($this->result['total_inserted'] > 0)
         ? $this->result
         : array('error' => 'Oops! unable to create record');
   }
}
