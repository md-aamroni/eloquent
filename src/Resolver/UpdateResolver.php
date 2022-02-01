<?php

namespace Adecoder\Eloquent\Resolver;

use Adecoder\Eloquent\Handler\QueryHandler;
use Adecoder\Eloquent\Interfaces\ResolverInterface;

class UpdateResolver implements ResolverInterface
{
   /**
    * QueryHandler Object
    * @var QueryHandler
    */
   private QueryHandler $update;

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
      $this->update = $query->resolve();
   }

   /**
    * Update Output
    * @return object 
    */
   public function update(): object
   {
      $this->result = array('total' => $this->update->connect->rowCount());
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
         : array('error' => 'Oops! unable to update record');
   }
}
