<?php

namespace Adecoder\Eloquent\Resolver;

use PDO;
use Adecoder\Eloquent\Handler\QueryHandler;
use Adecoder\Eloquent\Interfaces\ResolverInterface;

class SelectResolver implements ResolverInterface
{
   /**
    * QueryHandler Object
    * @var QueryHandler
    */
   private QueryHandler $select;

   /**
    * Result Handler
    * @var array|object
    */
   private array|object $result;

   /**
    * Object Instantiate
    * @param QueryHandler $query 
    * @param null|bool $itself 
    * @return void 
    */
   public final function __construct(private QueryHandler $query, private ?bool $itself = false)
   {
      $this->select = $query->resolve();
   }

   /**
    * Select Object
    * @return $this 
    */
   public function select(): object
   {
      $this->result = array(
         'lists' => $this->select->connect->fetchAll(PDO::FETCH_ASSOC),
         'total' => $this->select->connect->rowCount()
      );
      return $this;
   }

   /**
    * Response Handler
    * @return mixed 
    */
   public function response(): mixed
   {
      return (is_array($this->result['lists']) && (!empty($this->result['total']) && $this->result['total'] > 0))
         ? (!is_null($this->itself) && $this->itself === true ? $this->result['lists'][0] : $this->result['lists'])
         : array('error' => 'Oops! no records found');
   }
}
