# Sysvale Helpers

Php functions to make you work faster.

## Instalation

With composer:

```bash
composer require sysvale/helpers
```

## Methods

 * [maskBank](#maskBank)
 * [maskCpf](#maskCpf)
 * [unMaskCpf](#unMaskCpf)
 * [maskPhone](#maskPhone)
 * [maskMoney](#maskMoney)
 * [maskCep](#maskCep)
 * [maskCnpj](#maskCnpj)
 * trimpp
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
 * [monthPt](#monthPt)
 * [removeCrassLetters](#removeCrassLetters)
 * validateCpf
 * [weekDay](#weekDay)
 * city
 * getNFirstWords


## Usage Examples

### maskBank
```php
use Sysvale/Helpers;

$bankNumber = 12345;

$maskedBank = Helpers::maskBank($bankNumber)

// $maskedBank will be 1234-5
```

### maskCpf
```php
use Sysvale/Helpers;

$cpf = 12345678901;

$maskedCpf = Helpers::maskCpf($cpf)

// $maskedCpf will be 123.456.789-01
```

### unMaskCpf
```php
use Sysvale/Helpers;

$cpf = '123.456.789-01';

$unmaskedCpf = Helpers::unMaskCpf($cpf)

// $unmaskedCpf will be 12345678901
```

### maskPhone
```php
use Sysvale/Helpers;

$phone = 12345678901;

$maskedPhone = Helpers::maskPhone($phone)

// $maskedPhone will be (12) 34567-8901
```

### maskMoney
```php
use Sysvale/Helpers;

$value = 123456;

$maskedValue = Helpers::maskMoney($value)

// $maskedValue will be 1.234,56
```

### maskCep
```php
use Sysvale/Helpers;

$cep = 12345678;

$maskedCep = Helpers::maskCep($value)

// $maskedValue will be 123.456-78
```

### maskCnpj
```php
use Sysvale/Helpers;

$cnpj = 12345678901234;

$maskedCnpj = Helpers::maskCnpj($value)

// $maskedCnpj will be 12.345.678/9012-34
```

### urlNoCache
```php
use Sysvale/Helpers;

$url = 'https://dominio.com;

$noCache = Helpers::urlNoCache($url)

// $noCache will be https://dominio.com?_=123456
```

### monthPt
```php
use Sysvale/Helpers;

$month = Helpers::monthPt(7)

// $month will be Julho
```

### removeCrassLetters
```php
use Sysvale/Helpers;

$original = 'à noite';

$removed = Helpers::removeCrassLetters($original)

// $removed will be 'a noite'
```

### weekDay
```php
use Sysvale/Helpers;

$weekDay = Helpers::weekDay(1)

// $weekDay will be 'Segunda-feira'
```
