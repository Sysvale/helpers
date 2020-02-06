# Sysvale Helpers

Php functions to make you work faster.

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
 * trimpp
 * titleCase
 * firstUpper
 * urlNoCache
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
 * validateCNPJ
 * validatePhone
 * weekDay
 * validateResidentialPhone
 * validateMobilePhone
 * city
 * getNFirstWords


## Usage Examples

### maskBank
```php
use Sysvale/Helpers;

$bankNumber = 12345;

$maskedBank Helpers::maskBank($bankNumber)

// $maskedBank will be 1234-5
```

## Contributing Guidelines
If you are interested in contributing, please read and abide by the [contributing guidelines](CONTRIBUTING.md).