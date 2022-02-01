<?php

namespace Adecoder\Eloquent;

use Adecoder\Eloquent\Factories\Create;
use Adecoder\Eloquent\Factories\Delete;
use Adecoder\Eloquent\Factories\Select;
use Adecoder\Eloquent\Factories\Update;
use Adecoder\Eloquent\Database\Collection;

class Eloquent
{
   /**
    * Select Instance
    * @param string $query 
    * @param null|array $param 
    * @param null|bool $itself 
    * @return Select 
    */
   public static function select(string $query, ?array $param = null, ?bool $itself = false, ?bool $array = false): Select
   {
      $select = new Select(query: $query, param: $param, itself: $itself, array: $array);
      return $select->map(Collection::instance());
   }

   /**
    * Create Instance
    * @param string $query 
    * @param null|array $param 
    * @param null|bool $array 
    * @return Create 
    */
   public static function create(string $query, ?array $param = null, ?bool $array = false): Create
   {
      $create = new Create(query: $query, param: $param, array: $array);
      return $create->map(Collection::instance());
   }

   /**
    * Delete Instance
    * @param string $query 
    * @param null|array $param 
    * @param null|bool $array 
    * @return Delete 
    */
   public static function delete(string $query, ?array $param = null, ?bool $array = false): Delete
   {
      $delete = new Delete(query: $query, param: $param, array: $array);
      return $delete->map(Collection::instance());
   }

   /**
    * Update Instance
    * @param string $query 
    * @param null|array $param 
    * @param null|bool $array 
    * @return Update 
    */
   public static function update(string $query, ?array $param = null, ?bool $array = false): Update
   {
      $update = new Update(query: $query, param: $param, array: $array);
      return $update->map(Collection::instance());
   }
}
