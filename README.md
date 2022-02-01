<p align="center">
   <a href="https://adecoder.com" target="_blank">
      <img src="https://user-images.githubusercontent.com/61397934/151708131-1373e724-9264-4a52-b2f4-022f3d948357.png">
   </a>
   <h2>PDO Connection and MySQL Queries in PHP</h2>
</p>

![workflow](https://github.com/md-aamroni/eloquent/actions/workflows/application.yml/badge.svg)
![Copyright](https://img.shields.io/badge/Copyright-aDecoder-brightgreen.svg)
[![License](https://img.shields.io/badge/License-MIT-brightgreen.svg)](./LICENSE)
![Developed](https://img.shields.io/badge/PHP->=8.0-brightgreen.svg)
![Copyright](https://img.shields.io/badge/Developer-md.aamroni-brightgreen.svg)

### Installation
```bash
composer require adecoder/eloquent
```

### [Environment File](env-example)
```env
DB_APP_HOST=localhost
DB_APP_PORT=3308
DB_APP_NAME=xtra_guideasy_app_rdb
DB_APP_CHAR=utf8mb4
DB_APP_USER=root
DB_APP_PASS=
```

### Select Statement
```php
use Adecoder\Eloquent\Eloquent;

$query = "SELECT * FROM table_name WHERE id = :B_SEARCH;";
$param = array(':B_SEARCH' => 2);

$select = Eloquent::select(query: $query, param: $param, itself: false)->get();
dd($select);
```

### Create Statement
```php
use Adecoder\Eloquent\Eloquent;

$query = "INSERT INTO table_name (username, email_id) VALUE(:B_USER, :B_MAIL)";
$param = array(':B_USER' => 'md.aarmoni', ':B_MAIL' => 'md.aamroni@gmail.com');

$create = Eloquent::create(query: $query, param: $param, array: false)->get();
dd($create);
```

### Delete Statement
```php
use Adecoder\Eloquent\Eloquent;

$query = "DELETE FROM table_name WHERE id = :B_DELETE;";
$param = array(':B_DELETE' => 14);

$delete = Eloquent::delete(query: $query, param: $param, array: false)->get();
dd($delete);
```

### Update Statement
```php
use Adecoder\Eloquent\Eloquent;

$query = "UPDATE table_name SET username = :B_USER, email_id = :B_MAIL WHERE id = :B_UPDATE;";
$param = array(':B_USER' => 'md-aarmoni', ':B_MAIL' => 'aamroni@gmail.com', ':B_UPDATE' => 14);
$update = Eloquent::update(query: $query, param: $param, array: false)->get();
dd($update);
```