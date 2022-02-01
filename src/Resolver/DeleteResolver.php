<?php

namespace Adecoder\Eloquent\Resolver;

use Adecoder\Eloquent\Handler\QueryHandler;
use Adecoder\Eloquent\Interfaces\ResolverInterface;

class DeleteResolver implements ResolverInterface
{
   /**
    * QueryHandler Object
    * @var QueryHandler
    */
   private QueryHandler $delete;

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
      $this->delete = $query->resolve();
   }

   /**
    * Delete Output
    * @return object 
    */
   public function delete(): object
   {
      $this->result = array('total' => $this->delete->connect->rowCount());
      return $this;
   }

   /**
    * Response Handler
    * @return mixed 
    */
   public function response(): mixed
   {
      return !empty($this->result['total']) && ($this->result['total'] > 0)
         ? $this->result
         : array('error' => 'Oops! unable to delete record');
   }
}
