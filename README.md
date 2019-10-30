# Sysvale Helpers

[![Build Status](https://travis-ci.com/Sysvale/helpers.svg?branch=master)](https://travis-ci.com/Sysvale/helpers)

Php functions to make you work faster.

Sysvale Helpers requires PHP >= 7.2 and  php-mbstring extension

## Instalation

With composer:

```bash
composer require sysvale/helpers
```

## Methods

 * [maskBank](#maskBank)
 * maskCpf
 * unMaskCpf
 * maskPhone
 * maskMoney
 * maskCep
 * maskCnpj
 * [trimpp](#trimpp)
 * titleCase
 * firstUpper
 * [urlNoCache](#urlNoCache)
 * ptDate2IsoDate
 * regexAccents
 * toInt
 * toFloat
 * toTime
 * toArray
 * toArrayInt
 * toData
 * toBool
 * toBoolNotNull
 * removeAccents
 * compareVersion
 * monthPt
 * removeCrassLetters
 * validateCpf
 * weekDay
 * city
 * getNFirstWords


## Usage Examples

### maskBank
```php
use Sysvale/Helpers;

$bankNumber = 12345;

$maskedBank = Helpers::maskBank($bankNumber);

// $maskedBank will be 1234-5
```

### trimpp
```php
use Sysvale/Helpers;

$text = " Text \t \n "; //String with spaces and special caracter;

$text = Helpers::trimpp($text);

// $text will be Text
```

### urlNoCache
```php
use Sysvale/Helpers;

$url = 'http://url.com.br';

$url = Helpers::urlNoCache($url);

// $url will be http://url.com.br?1570588480
```

## Contributing Guidelines
If you are interested in contributing, please read and abide by the [contributing guidelines](CONTRIBUTING.md).
