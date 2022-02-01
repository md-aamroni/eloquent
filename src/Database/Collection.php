<?php

namespace Adecoder\Eloquent\Database;

use PDO;
use Exception;
use PDOException;
use Adecoder\Eloquent\Interfaces\ConnectionInterface;

class Collection implements ConnectionInterface
{
   /**
    * Collection Instance
    * @var Collection
    */
   private static Collection $instance;

   /**
    * Prevent Object Instantiate
    * @return void 
    */
   private final function __construct()
   {
   }

   /**
    * Get Collection Instance
    * @return Collection 
    */
   public static function instance(): Collection
   {
      return !isset(self::$instance) ? new Collection() : self::$instance;
   }

   /**
    * Database Connection
    * @return PDO 
    */
   public function connection(): PDO
   {
      try {
         $dsn = 'mysql:host=' . $_ENV['DB_APP_HOST'] . ';port=' . $_ENV['DB_APP_PORT'] . ';dbname=' . $_ENV['DB_APP_NAME'] . ';charset=' . $_ENV['DB_APP_CHAR'] . '';
         $con = new PDO(dsn: $dsn, username: $_ENV['DB_APP_USER'], password: $_ENV['DB_APP_PASS']);
         $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
         return $con;
      } catch (PDOException $e) {
         exit('Connection error: ' . $e->getMessage());
      }
   }

   /**
    * Prevent Object Cloning
    * @return void 
    */
   private function __clone(): void
   {
   }

   /**
    * Prevent Object Serialization
    * @return never 
    * @throws Exception 
    */
   public final function __wakeup()
   {
      throw new Exception("Cannot unserialize singleton");
   }
}
