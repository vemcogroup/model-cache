# Model local cache

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vemcogroup/model-cache.svg?style=flat-square)](https://packagist.org/packages/vemcogroup/nova-websockets)
[![Total Downloads](https://img.shields.io/packagist/dt/vemcogroup/model-cache.svg?style=flat-square)](https://packagist.org/packages/vemcogroup/nova-websockets)

## Description

This package allows to have static local cache on your models.

It can both be used with a cache server or without. 

## Installation

You can install the package via composer:

```bash
composer require vemcogroup/model-cache
```

## Usage

It's easy to use the trait in your own class just Use the trait as below

```php
use Vemcogroup\ModelCache\Traits\HaslocalCache;

class DataRepository 
{
    use HasLocalCache;
    
    public function getData($userId)
    {
        $localCacheKey = 'getData.'.$userId;
        
        /*
         * If localCache exists with key return cache
         */
        if ($cache = self::getLocalCache($localCacheKey)) {
           return $cache;
        }
         
         // Run DB query or Cache code
         $result = [1, 2, 3, 4, 5, 6];
         
         /*
          * Remember to save your DB query or Cache result
          */
         self::setLocalCache($localCacheKey, $result);
         
         return $result;
    }
}

``` 

If you need to clear the Cache you can use the clear method

```php
self::clearLocalCache();
```