<?php

namespace Adecoder\Eloquent\Handler;

class FormatHandler
{
   /**
    * Object Instantiate
    * @param array|object $data 
    * @param null|bool $array 
    * @return void 
    */
   public final function __construct(private array|object $data, private ?bool $array = false)
   {
      // @todo: Skip Coding
   }

   /**
    * Format Outpu
    * @return mixed 
    */
   public function format(): mixed
   {
      return match ($this->array) {
         true  => $this->arr(),
         false => $this->obj()
      };
   }

   /**
    * Get Array
    * @return mixed 
    */
   private function arr(): mixed
   {
      return json_decode(json_encode($this->data, JSON_PRETTY_PRINT), true);
   }

   /**
    * Get Object
    * @return mixed 
    */
   private function obj(): mixed
   {
      return json_decode(json_encode($this->data, JSON_PRETTY_PRINT), false);
   }
}
