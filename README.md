# Yii2 Barcode Generator

The JavaScript Barcode Generator for Yii2

[![Latest Stable Version](https://img.shields.io/packagist/v/diecoding/yii2-barcode-generator?label=stable)](https://packagist.org/packages/diecoding/yii2-barcode-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/diecoding/yii2-barcode-generator)](https://packagist.org/packages/diecoding/yii2-barcode-generator)
[![Latest Stable Release Date](https://img.shields.io/github/release-date/sugeng-sulistiyawan/yii2-barcode-generator)](https://github.com/sugeng-sulistiyawan/yii2-barcode-generator)
[![Quality Score](https://img.shields.io/scrutinizer/quality/g/sugeng-sulistiyawan/yii2-barcode-generator)](https://scrutinizer-ci.com/g/sugeng-sulistiyawan/yii2-barcode-generator)
[![Build Status](https://img.shields.io/travis/com/sugeng-sulistiyawan/yii2-barcode-generator)](https://app.travis-ci.com/sugeng-sulistiyawan/yii2-barcode-generator)
[![License](https://img.shields.io/github/license/sugeng-sulistiyawan/yii2-barcode-generator)](https://github.com/sugeng-sulistiyawan/yii2-barcode-generator)
[![PHP Version Require](https://img.shields.io/packagist/dependency-v/diecoding/yii2-barcode-generator/php?color=6f73a6)](https://packagist.org/packages/diecoding/yii2-barcode-generator)

> Yii2 Barcode Generator uses [JsBarcode](https://lindell.me/JsBarcode/) <br> Demo: https://lindell.me/JsBarcode/

## Table of Contents

- [Yii2 Barcode Generator](#yii2-barcode-generator)
  - [Table of Contents](#table-of-contents)
  - [Instalation](#instalation)
  - [Dependencies](#dependencies)
  - [Usage](#usage)
    - [Simple Usage](#simple-usage)
    - [Advanced Usage](#advanced-usage)

## Instalation

Package is available on [Packagist](https://packagist.org/packages/diecoding/yii2-barcode-generator), you can install it using [Composer](https://getcomposer.org).

```shell
composer require diecoding/yii2-barcode-generator "^1.0"
```

or add to the require section of your `composer.json` file.

```
"diecoding/yii2-barcode-generator": "^1.0"
```

## Dependencies

- PHP 7.4+
- [yiisoft/yii2](https://github.com/yiisoft/yii2)
- [npm-asset/jsbarcode](https://asset-packagist.org/package/npm-asset/jsbarcode)

## Usage

### Simple Usage

```php
use diecoding\barcode\generator\Barcode;

Barcode::widget();
```

### Advanced Usage

```php
use diecoding\barcode\generator\Barcode;

Barcode::widget([
    
]);
```