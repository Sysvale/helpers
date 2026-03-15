# Sysvale Helpers

[![Build Status](https://travis-ci.com/Sysvale/helpers.svg?branch=master)](https://travis-ci.com/Sysvale/helpers)

PHP functions to make you work faster.

Sysvale Helpers requires PHP >= 7.2 and  php-mbstring extension

## Installation

With composer:

```bash
composer require sysvale/helpers
```

## Helpers class methods

 * [maskBank](#maskBank)
 * [maskCpf](#maskCpf)
 * [unMaskCpf](#unMaskCpf)
 * [maskPhone](#maskPhone)
 * [maskMoney](#maskMoney)
 * [maskCep](#maskCep)
 * [maskCnpj](#maskCnpj)
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
 * monthPtAbbr
 * removeCrassLetters
 * validateCpf
 * validateCNPJ
 * validatePhone
 * weekDay
 * validateResidentialPhone
 * validateMobilePhone
 * getNFirstWords


### Usage Examples

#### maskBank
```php
use Sysvale\Helpers;

$bankNumber = 12345;

$maskedBank = Helpers::maskBank($bankNumber);

// $maskedBank will be 1234-5
```

#### maskCpf
```php
use Sysvale\Helpers;

$cpf = '12345678901';

$maskedCpf = Helpers::maskCpf($cpf);

// $maskedCpf will be 123.456.789-01
```

#### unMaskCpf
```php
use Sysvale\Helpers;

$cpf = '123.456.789-01';

$unMaskedCpf = Helpers::unMaskCpf($cpf);

// $unMaskedCpf will be 12345678901
```

#### maskPhone
```php
use Sysvale\Helpers;

$phone = '79988001010';

$maskedPhone = Helpers::maskPhone($phone);

// $maskedPhone will be (79) 98800-1010
```

#### maskMoney
```php
use Sysvale\Helpers;

$value = 1234.56;

$maskedMoney = Helpers::maskMoney($value);

// $maskedMoney will be 1.234,56
```

#### maskCep
```php
use Sysvale\Helpers;

$cep = '49000000';

$maskedCep = Helpers::maskCep($cep);

// $maskedCep will be 49000-000
```

#### maskCnpj
```php
use Sysvale\Helpers;

$cnpj = '12345678000199';

$maskedCnpj = Helpers::maskCnpj($cnpj);

// $maskedCnpj will be 12.345.678/0001-99
```

#### trimpp
```php
use Sysvale\Helpers;

$text = " Text \t \n "; //String with spaces and special caracter;

$text = Helpers::trimpp($text);

// $text will be Text
```

#### urlNoCache
```php
use Sysvale\Helpers;

$url = 'http://url.com.br';

$url = Helpers::urlNoCache($url);

// $url will be http://url.com.br?1570588480
```

#### monthPtAbbr
```php
use Sysvale\Helpers;

$month = 1;

$abbr = Helpers::monthPtAbbr($month);

// $abbr will be Jan
```

## Validate class

The validation methods can be accessed directly in the `Validate` class.
To use the class import as in the example:

```php
  use Sysvale\Helpers\Validate;
```

### Validate class methods

* [isValidCpf](#isValidCpf)
* [isValidCnpj](#isValidCnpj)
* [isValidPhone](#isValidPhone)
* [isValidResidentialPhone](#isValidResidentialPhone)
* [isValidMobilePhone](#isValidMobilePhone)

### Use exemples

#### isValidCpf

```php
use Sysvale\Helpers\Validate;

$value = '334.734.750-17';

$isValid = Validate::isValidCpf($value);

// true
```

#### isValidCnpj

```php
use Sysvale\Helpers\Validate;

$value = '56.396.710/0001-37';

$isValid = Validate::isValidCnpj($value);

// true
```

#### isValidPhone

```php
use Sysvale\Helpers\Validate;

$value = '79988001010';

$isValid = Validate::isValidPhone($value);

// true
```

#### isValidResidentialPhone

```php
use Sysvale\Helpers\Validate;

$value = '7033662200';

$isValid = Validate::isValidResidentialPhone($value);

// true
```

#### isValidMobilePhone

```php
use Sysvale\Helpers\Validate;

$value = '70993662200';

$isValid = Validate::isValidMobilePhone($value);

// true
```


## Contributing Guidelines
If you are interested in contributing, please read and abide by the [contributing guidelines](CONTRIBUTING.md).
